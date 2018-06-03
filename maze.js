var deep;
var walls=[];
var startWindow = document.getElementById("startWindow");
var newTestWindow = document.getElementById("newTestWindow");
var newTestButton = document.getElementById("newTestButton");
var score=document.getElementById("score");
             


function startGame() {
    startWindow.style.display="none";
    score.innerHTML="Score:0";
    score.style.display = "block";                                            
    deep = new piece(0,20, "red", 40, 120);
    gameArea.start();
    }

var gameArea = {
    canvas : document.createElement("canvas"),
    start : function() {
        this.canvas.width =1325;                                               //create canvas
        this.canvas.height =600;
        this.context = this.canvas.getContext("2d");
        this.frameNo=0;
        document.body.insertBefore(this.canvas, document.body.childNodes[1]);
        this.interval = setInterval(updateGameArea, 20);
    },
    clear : function() {
        this.context.clearRect(0, 0, this.canvas.width, this.canvas.height);
    },
    stop :function(){
        clearInterval(this.interval);
    }
}

function piece(width, height, color, x, y) {
    this.width = width;
    this.height = height;
    this.x = x;
    this.y = y;
    this.speedx=0;
    this.speedy=0;   
    this.update = function(){
        ctx = gameArea.context;
        ctx.fillStyle = color;
        if(this.width==0){
            ctx.beginPath();
            ctx.arc(this.x,this.y,this.height,0,Math.PI*2);
            ctx.closePath();                                                  //to draw a circle
            ctx.fill();
        }
        else{
            ctx.beginPath();
            ctx.fillRect(this.x, this.y, this.width, this.height);            //to draw walls
            ctx.closePath();
        }
    }
    this.hitWall = function(otherobj) {                                       //check for ball collision
        var myleft = this.x - (this.height);
        var myright = this.x + (this.height);
        var mytop = this.y - (this.height);
        var mybottom = this.y + (this.height);
        var otherleft = otherobj.x;
        var otherright = otherobj.x + (otherobj.width);
        var othertop = otherobj.y;
        var otherbottom = otherobj.y + (otherobj.height);
        var crash = true;
        if ((mybottom < othertop) ||
               (mytop > otherbottom) ||
               (myright < otherleft) ||
               (myleft > otherright)) {
           crash = false;
        }
        return crash;
    
    }
}

function updateGameArea() {
    var x, height, gap, minHeight, maxHeight, minGap, maxGap;
    for (i = 0; i < walls.length; i += 1) {
        if (deep.hitWall(walls[i])) {
            gameArea.stop();
            gameArea.canvas.remove();
            score.style.display="none";
            
            document.getElementById("finalScore").innerHTML=score.innerHTML;
            newGameWindow.style.display = "block";
           } 
    }
    gameArea.clear();
    gameArea.frameNo += 1;
    console.log(gameArea.frameNo);
    score.innerHTML="Score:" + deep.x;                               // display score
    if (gameArea.frameNo == 1 || wallInterval(25)) {
        x = gameArea.canvas.width;
        y= gameArea.canvas.height;
        minHeight = 50;
        maxHeight = 200;
        height = Math.floor(Math.random()*(maxHeight-minHeight+1)+minHeight);    //generate random height
        minGap = 100;
        maxGap = 200;
        gap = Math.floor(Math.random()*(maxGap-minGap+1)+minGap);                //generate random gap
        walls.push(new piece(10, height, "#000099", x, 0));
        walls.push(new piece(10, y - height-gap, "#000099", x, height+gap));
    }
    for (i = 0; i < walls.length; i += 1) {
        
        if(gameArea.frameNo<500)                                                //add levels 
        walls[i].x += -5;
        else if(gameArea.frameNo<1000)
        walls[i].x += -7;
        else if(gameArea.frameNo<1500)
        walls[i].x += -9;
        else
        walls[i].x += -10;
        walls[i].update();
    }
    gameArea.canvas.addEventListener("mousemove",function(e){                    //check for mouse movement
       deep.x=e.clientX;
       deep.y=e.clientY;
    });    
    deep.update();
}

function wallInterval(n) {
    if ((gameArea.frameNo / n) % 1 == 0) {
        return true;}
    return false;
}

newGameButton.addEventListener("click", function(){                              //restart game
    window.location.reload();
});

 

