var canvas = document.getElementById("canvas");
var c = canvas.getContext('2d');
canvas.width = innerWidth;
canvas.height = innerHeight;  // setting height and width of canvas to size of browser
        
        var x_obstacle = innerWidth;  //initially obstacle comes from right end
		var gap_length = Math.random()*50 +35; 
		var gap_y = Math.random()*innerHeight; // passage area of obstacle
		var dx_obstacle =-3;
		var obstacle_width=20;
		var radius_gamer =10;  // speed of obstacle
        var score = 1;
        var i =0, j=0;
        var game_start = false;
        var x_gamer=5;
		var y_gamer=0;
		var enemy_x = innerWidth;
		var enemy_y = Math.random()*innerHeight;
		var enemy_speed = -5;
		var enemy_radius = 2;
		
        

		var mouse ={
			x: undefined,
			y: undefined
		}

		window.addEventListener('mousemove',function(e){
          mouse.x = e.clientX;
          mouse.y = e.clientY;
          console.log(e);
		});

function start(){
    game_start = true;
}

function Game(x_obstacle,gap_length,dx_obstacle,gap_y,s,i,j,width_obstacle,radius_gamer,x_gamer,y_gamer,enemy_x,enemy_y,enemy_speed,enemy_radius){
         	this.x_obstacle = x_obstacle;
         	this.gap_length = gap_length;
         	this.dx_obstacle = dx_obstacle;
         	this.gap_y = gap_y;
         	this.s = s;
         	this.i = i;
         	this.j = j;
         	this.width_obstacle = width_obstacle;
         	this.radius_gamer = radius_gamer;
         	this.x_gamer = x_gamer;         	
         	this.y_gamer = y_gamer;
         	this.enemy_speed = enemy_speed;
         	this.enemy_y = enemy_y;
         	this.enemy_x = enemy_x;
         	this.enemy_radius = enemy_radius;
         	

            
            
            this.draw = function() { 
            
            this.i = this.i +1;
            if(this.i>=5000+this.j){  //increasing difficulty
            	this.dx_obstacle =this.dx_obstacle - .5;
            	this.enemy_speed = this.enemy_speed -.5;
            	this.enemy_radius+=.5; 
            	this.j = this.i;}
             
         	c.save();
			c.translate(this.x_obstacle,0);   //drawing the obstacle
			c.fillStyle = 'blue';
			c.fillRect(0,0,this.width_obstacle,innerHeight);
			c.restore();
			
			c.save();                
			c.translate(this.x_obstacle,this.gap_y);   //drawing passage area
			c.fillStyle = 'grey';
			c.fillRect(0,0,this.width_obstacle,this.gap_length);
			c.restore();
            }
            
            
            this.score = function(){ //giving score
            	this.s = this.s + 1;
            	c.fillStyle = "black";
            	c.fillText('Score:' + this.s, innerWidth/16,innerHeight/16);
            }

           
            
            this.draw_gamer = function(){ //drawing Gamer
            c.save();
            c.beginPath();
            c.translate(this.x_gamer,this.y_gamer);
            c.arc(10, 0, this.radius_gamer, 0, Math.PI * 2, true);
            c.closePath();
            c.fillStyle = 'red';
            c.fill();
            c.restore();
            }


            this.draw_ememy = function(){ 
            	c.save();
            	c.beginPath();
            	c.translate(this.enemy_x,this.enemy_y);
            	c.arc(0,0,this.enemy_radius,0,Math.PI*2,true)
            	c.closePath();
            	c.fillStyle = 'yellow';
            	c.fill();
            	c.restore();

            }



            this.check = function(){ // cheacking for collision
            	if(((this.x_gamer + this.radius_gamer >= this.x_obstacle) && (this.x_gamer - this.radius_gamer <= this.x_obstacle + this.width_obstacle)) && (!((mouse.y + this.radius_gamer >= this.gap_y)&&(mouse.y - this.radius_gamer <= this.gap_y + this.gap_length)))||(distance(this.x_gamer,this.y_gamer,this.enemy_x,this.enemy_y)<= this.radius_gamer+this.enemy_radius)||(this.x_gamer-this.radius_gamer<=0)){
    	        game_start = false;
    	        document.getElementById('restart').style.display = 'block';
    	        document.getElementById('score').style.display = 'block';
    	        document.getElementById('score').innerHTML = "Your Score Is:" + this.s;
    	        this.s = 1;
                  this.i=0;
                  this.j=0;
                  this.x_obstacle = innerWidth;

    	    }
            }
            

            this.update = function(){
         		this.x_obstacle += this.dx_obstacle;  
         		  //moving shape
         		  this.enemy_x += this.enemy_speed;
         		  this.bullet_x+= this.bullet_speed;
         		
         		if (this.x_obstacle<=0) { // generate new shape.
         			
         			 this.x_obstacle = innerWidth;
		             this.gap_length = Math.random()*50+35;
		             this.gap_y = Math.random()*innerHeight;
		         }
		         if(this.enemy_x<=0){
		         	this.enemy_x = innerWidth;
		            this.enemy_y = Math.random()*innerHeight;
		        }

		         this.draw();
		         this.draw_gamer();
		         this.draw_ememy();
		         this.score();
		         this.check();


		     }
}




function distance(x1,y1,x2,y2){ //calculating distance between two points
	var xdistance = x1 - x2;
	var ydistance = y1 - y2;

	return Math.sqrt(Math.pow(xdistance,2) + Math.pow(ydistance,2));
}
 

 function restart(){
 	              document.getElementById('restart').style.display = 'none';
                  document.getElementById('score').style.display = 'none';
                  game_start = true;
}
      
       
       var game = new Game(x_obstacle,gap_length,dx_obstacle,gap_y,score,i,j,obstacle_width,radius_gamer,x_gamer,y_gamer,enemy_x,enemy_y,enemy_speed,enemy_radius);
      
 
 	function animate(){
 	   // animation function
	window.requestAnimationFrame(animate);
	if(game_start== true){ 

	c.clearRect(0,0,canvas.width,canvas.height);
	c.fillStyle = "grey";
	c.fillRect(0,0,innerWidth,innerHeight);
	game.y_gamer = mouse.y;
	game.x_gamer = mouse.x;
	game.update();
	
}
}

animate();




