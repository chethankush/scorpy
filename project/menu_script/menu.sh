
#!/bin/bash

## check if key and cert files match
check() {
    path=/usr/share/nesi/snetex/
    var1=openssl rsa -in $path/snx.key -modulus | openssl sha256  ##get modulus of key file
    var2=openssl x509 -in $path/snx.crt -modulus | openssl sha256  ##get modulus of cert file
    if [ "$var1" = "$var2" ]; then  ## compare the two files
	    echo "Key and cert files match"
    else
	    echo "key and cert files doesn't match"
	
}

## renew certificate
renew_cert() {
    year=$(date +%Y)
    year1=$((year + 2))
    year3="$year""$year1" 

    mv /usr/share/nonactive-certs/new/* /usr/share/nonactive-certs/old/ ## moving all files to old files 

    openssl req -nodes -newkey rsa:2048 -keyout /usr/share/nonactive-certs/new/snx.key."$year3" -out /usr/share/nonactive-certs/new/snx.csr."$year3"
}

## manage certificate service
certificate_service() {
    read -p "Enter action for crt (valid/match/renew): " action
    path=/usr/share/nesi/snetex/

    case "$action" in
        valid)
            openssl x509 -in $path/snx.crt -text -noout | grep -i not ##check validity
            ;;
        match)
            check  ##call check function to compare key and cert files
            ;;
        renew)
            renew_cert
        *)
            echo "Invalid action"
            ;;
    esac

    read -p "Press Enter to return to menu..."
}

## manage hyperchannel services
check_service() {
    read -p "Enter action for httpd (status/start/stop/restart): " action

    case "$action" in
        status)
            systemctl status snetex ##check status of snetexservice
	        systemctl status sbfxjs ##check status of sbfxjs service
            ;;
        start)
            systemctl start snetex  ##start snetex service
	        systemctl start sbfxjs  ##start sbfxjs service
            ;;
        stop)
            systemctl stop sbfxjs  ##stop sbfxjs service
	        systemctl stop snetex  ##stop snetex service
            ;;
        restart)
            systemctl stop sbfxjs  ##stop sbfxjs service
	        systemctl stop snetex  ##stop snetex service
	        sleep 20
            systemctl start snetex ##start snetex service
	        systemctl start sbfxjs  ##start sbfxjs service
            ;;
        *)
            echo "Invalid action"
            ;;
    esac

    read -p "Press Enter to return to menu..."
}

## manage license service
license_service() {
    read -p "Enter action for License (show/renew/view): " action
    path=/usr/share/nesi/  ##set path variable

    case "$action" in
        show)
            snxmapop key  ##show current license key
            ;;
        renew)
            echo "Upload the latest license: "
	        vim $path/License
	        echo "Now loading the key"
	        sleep 5
	        snxmapop load ##load new license key
	        snxmapop key  ##show current license key
            ;;
	view)
	    cat $path/license
	    ;;
        *)
            echo "Invalid action"
            ;;
    esac

    read -p "Press Enter to return to menu..."
}


## main menu
menu() {
    echo "Select an option:"
    echo "1) Hyperchannel Service Menu"
    echo "2) license_service"
    echo "3) certificate_service"
    echo "00) Exit"
    read -p "Enter choice: " choice

    case "$choice" in
        1)
            check_service   ##call hyperchannel service function
            ;;
        2)
            license_service  ##call license service function
            ;;
	    3)
	        certificate_service  ##call certificate service function
	        ;;
        00)
            echo "Exiting program" ##exit program
            exit 0
            ;;
        *)
            echo "Invalid option"
            ;;
    esac
}

## loop menu
while true
do
    menu
done
