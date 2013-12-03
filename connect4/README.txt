Shangfeng Joe Jian	Arthur Chin
c0jiansh		c0chinar
998373451		998362105

----------------------------------------------------------------------
How to Use:
The tar must be extracted to the htdocs, otherwise captcha does not show.

Most of the account related methods are the same as the original starter
code. Player may login if their account exist in the database. They may
also create new accounts in the same way except there is now an additional
required captcha field. 

Once users have logged in, they may start a match with available users.
A game board is automatically loaded as soon as players enter the match
room. Inviting player cannot make a move until the invitee has accepted. 
If the match is rejected, the inviter is sent back to the waiting room.

If a match is accepted, the connect4 game begins. The inviter is initialized
to go first and is shown in the turn field. Players then take turns playing
the game of connect 4 until a result has been met. The result of the game
is shown as an alert to both players. If and only if a winner has been
decided (which means not a tie) then the result is updated in the database.
----------------------------------------------------------------------
Design:
We have decided to use the source code for a connect 4 game from:
http://www.javascriptsource.com/games/connect-4.html

We have taken this code and revised it due to the fact is was meant for
two players on a single browser. Due to this decision we have realized
a couple of issue arise when dealing with concurrency.

The board_state does not save the actual board and has no recollection of
moves beyond the last.
----------------------------------------------------------------------
Notable Bugs:
Captcha does not show up unless the files are placed correctly.

Unwanted behaviour when refreshing during a game since board is not saved
in board_state of the match database.