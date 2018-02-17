
    <div class="contentBody">
    	<div class="post">
        <?php
		if(isset($_REQUEST['menu_id'])){
			$menu_id=$_REQUEST['menu_id'];
			extract($obj->getById("menus","*","menu_id=$menu_id"));
		
		?>
            <h2><?php echo $name; ?></h2>
          
            <p>
               <?php echo $content; ?>
            </p>
           
            <?php
		}
		
		elseif(isset($_REQUEST['cat_id'])){
			$cat_id=$_REQUEST['cat_id'];
			$all_articles=$obj->getALLMenus("articles","*","cat_id=$cat_id");
		foreach($all_articles as $article){
			extract($article);
		?><br>

            <h2><?php echo $title; ?></h2>
          
            <p>
               <?php 
			   
			    $to_array=explode(" ",$content); 
				//print_r($to_array);
				if(count($to_array)>50){
					$array_slice=array_slice($to_array,0,50);
					echo implode(" ",$array_slice);
					?>
					&nbsp;<a href="index.php?readmore=<?php echo $art_id; ?>">Read more...</a>
                    <?php
				}
				else{
					echo $content;	
				}
				
				?>
            </p>
           
            <?php
		}
		}
		
		
		elseif(isset($_REQUEST['readmore'])){
			$readmore=$_REQUEST['readmore'];
			extract($obj->getById("articles","*","art_id=$readmore"));
		
		?>
            <h2><?php echo $title; ?></h2>
          
            <p>
               <?php echo $content; ?>
            </p>
           
            <?php
		}
		
		else{
			echo "<h2>Home Page</h2>";
                       echo "It is a long established fact that a reader will be distracted by the readable content of a page when looking"
                        . " at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as"
                               . " opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing "
                               . "packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'"
                               . " will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by "
                               . "accident, sometimes on purpose (injected humour and the like). <br><br>";
                        
                        echo "<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking"
                        . " at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as"
                               . " opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing "
                               . "packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum'"
                               . " will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by "
                               . "accident, sometimes on purpose (injected humour and the like).</p> ";
                        
		}
		?>
        </div>
        
    </div>