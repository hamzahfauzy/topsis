<!-- JQuery -->
<script type="text/javascript" src="<?=$this->assets->get('js/jquery-3.3.1.min.js')?>"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="<?=$this->assets->get('js/popper.min.js')?>"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="<?=$this->assets->get('js/bootstrap.min.js')?>"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="<?=$this->assets->get('js/mdb.min.js')?>"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('.slider').slick({
		dots: true,
		autoplay:true,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		arrows: true
	});
});
</script>
</body>
</html>