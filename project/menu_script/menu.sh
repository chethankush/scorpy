#!/bin/bash

check() {
    path=/usr/share/nesi/snetex/
    var1=openssl rsa -in $path/snx.key -modulus | openssl sha256
    var2=openssl x509 -in $path/snx.crt -modulus | openssl sha256
    if [ var1 -eq var2 ]; then
	echo "Key and cert files match"
    else
	echo "key and cert files doesn't match"
	
}


certificate_service() {
    read -p "Enter action for crt (valid/match/renew/restart): " action
    path=/usr/share/nesi/snetex/

    case "$action" in
        valid)
            openssl x509 -in $path/snx.crt -text -noout | grep -i not
            ;;
        match)
            check
            ;;
        stop)
            systemctl stop httpd
            ;;
        restart)
            systemctl restart httpd
            ;;
        *)
            echo "Invalid action"
            ;;
    esac

    read -p "Press Enter to return to menu..."
}

check_service() {
    read -p "Enter action for httpd (status/start/stop/restart): " action

    case "$action" in
        status)
            systemctl status snetex
	    systemctl status sbfxjs
            ;;
        start)
            systemctl start snetex
	    systemctl start sbfxjs
            ;;
        stop)
            systemctl stop sbfxjs
	    systemctl stop snetex
            ;;
        restart)
            systemctl stop sbfxjs
	    systemctl stop snetex
	    sleep 20
            systemctl start snetex
	    systemctl start sbfxjs
            ;;
        *)
            echo "Invalid action"
            ;;
    esac

    read -p "Press Enter to return to menu..."
}

license_service() {
    read -p "Enter action for License (show/renew/view): " action
    path=/usr/share/nesi/

    case "$action" in
        show)
            snxmapop key
            ;;
        renew)
            echo "Upload the latest license: "
	    vim $path/License
	    echo "Now loading the key"
	    sleep 5
	    snxmapop load
	    snxmapop key
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

menu() {
    echo "Select an option:"
    echo "1) Hyperchannel Service Menu"
    echo "2) license_service"
    echo "3) certificate_service"
    echo "00) Exit"
    read -p "Enter choice: " choice

    case "$choice" in
        1)
            check_service
            ;;
        2)
            license_service
            ;;
	3)
	    certificate_service
	    ;;
        00)
            echo "Exiting program"
            exit 0
            ;;
        *)
            echo "Invalid option"
            ;;
    esac
}

while true
do
    menu
    echo
done
