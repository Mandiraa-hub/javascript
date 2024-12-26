const WIN_POINT = 3;
const LOST_POINT = 0;
const DRAW_POINT = 1;

let wins=prompt("Enter the number of Wins");
let losses=prompt("Enter the number of losses");
let draws=prompt("Enter the number of draws");

// if(wins)
// {
//  x=wins*WIN_POINT;
// }
// if (losses)
// {
//     y=losses*LOST_POINT;
// }
// if(draws)
// {
//     z=draws*DRAW_POINT;
// }
//  total=x+y+z;
// alert("Your total points is" + total);


    x=wins*WIN_POINT;
    y=losses*LOST_POINT;
    z=draws*DRAW_POINT;
    total=x+y+z;
    alert("Your total points is" + total);