<?php 
use PHPBootstrap\Widget\Layout\Box;
use PHPBootstrap\Widget\Misc\Image;
use PHPBootstrap\Widget\Carousel\CarouselItem;
use PHPBootstrap\Widget\Carousel\Carousel;
use PHPBootstrap\Widget\Layout\Panel;

$text = '<p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 
		3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>';
?>
<fieldset>
	<legend>Test Widget JavaScript</legend>
	<div class="block">
		<em>Carousel</em>
		<?php
		$table = new Box(11);
		$ui = new Carousel('carousel');
		$table->append($ui);
		$ui->addItem(new CarouselItem(new Image('carousel-01.jpg'), new Panel('<h4>Carousel 01</h4>' . $text . '<a href="#" class="btn btn-primary">More</a>')));
		$ui->addItem(new CarouselItem(new Image('carousel-02.jpg'), new Panel('<h4>Carousel 02</h4>' . $text . '<a href="#" class="btn btn-primary">More</a>')));
		$ui->addItem(new CarouselItem(new Image('carousel-03.jpg'), new Panel('<h4>Carousel 03</h4>' . $text . '<a href="#" class="btn btn-primary">More</a>')));
		$table->render();
		?>
	</div>
	<div class="block">
		<em>Carousel</em>
		<?php
		$ui->setName('carousel1');
		$table->render();
		?>
	</div>
</fieldset>