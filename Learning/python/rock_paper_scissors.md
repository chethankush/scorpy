## You can play with computer for rock, paper and scissors
```bash
import random

def play():
    your = input("Enter your choice\n 'r' for rock,  'p' for paper,  's' for scissors:  ")
    computer = random.choice(['r','p','s'])
    
    
    if your == computer:
        return "\n its a tie"
    
    if is_win(your, computer):
        print (f"you won!!!, computer choice {computer}")
    else:
        print("Better luck next time")

   
def is_win(your, computer):
    if (your == 'r' and computer == 's') or ( your == 'p' and computer == 'r') or ( your == 's' and computer == 'p'):
        return True

play()

```
