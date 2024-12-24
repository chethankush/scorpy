##This is will unlimited guess
```bash
import random 

def guess(x):
    random_number = random.randint(1,x)
    number = 0

    print(" you have unlimited guesses to be winner:")

    while number != random_number:
        number = int(input(f"Guess a number within 1 to {x} : "))
        if number < random_number:
            print("number is lower ")
        elif number > random_number:
            print("number is higher ")
    print(f"yay!!, you won , the number is {number} ")

guess(20)

````

##This is with 3 limit guess
```bash
import random

def guess(x):
    random_number = random.randint(1,x)
    choice = 3

    print(f" you have {choice} guesses to be winner:")

    while choice != 0:
        number = int(input(f"Guess a number within 1 to {x} : "))
        if number == random_number:
            choice = 0
        else:
            choice = choice - 1
            if number < random_number:
                print("number is lower, Try again ")
            elif number > random_number:
                print("number is higher, Try again ")
    if number != random_number:
        print("Sorry!!, ran out of your guesses, better luck next time")
    else:
        print("yay!!!  you won")

guess(20)
```

### Computer will guess your number in 4-5 guesses
```bashimport random

def guess(x):
    low = 1
    high = x
    function = 'a'
    print("Am so brilliant that I can guess your number in 4 guesses")
    
    while function != 'y':
        number = random.randint(low,high)
        function = input(f"Is this your number {number}:  ")
        if function == 'n':
            function = input(f"Is the number higher or lower:   ")
            if function == 'h':
                low = number + 1
            elif function == 'l':
                high = number - 1
            else:
                print("enter correct key")
    
    print(f"I got your number -->   {number}")
    

guess(50)

```
