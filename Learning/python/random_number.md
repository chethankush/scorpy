##This is will unlimited guess
```bash
import random

def guess(x):
    random_number = random.randint(1,x)
    number = 0

    print(f" you have {choice} guesses to be winner:")

    while number != random_number:
        number = int(input(f"Guess a number within 1 to {x} : "))
        if number < random_number:
            print("number is lower ")
        elif number > random_number:
            print("number is higher ")
    print("Sorry!!, better luck next time")

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
