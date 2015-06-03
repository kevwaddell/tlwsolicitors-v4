<?php if ($campaigns_active) { 
$campaigns = get_field('campaigns', 'options');	
$radio_ads_active = get_field('radio_adverts_active', 'option');
$radio_ads_title = get_field('radio_adverts_title', 'option');	
$radio_ads = get_field('radio_adverts', 'option');	
$radio_stations = get_field('radio_stations', 'option');
//echo '<pre>';print_r($campaigns);echo '</pre>';
?>
<!-- OUR LATEST CAMPAIGNS -->
<section id="hp-campaigns">
	
	<h3 class="text-center"><i class="fa fa-comment"></i> Our Latest Campaigns</h3>
	
	<div class="hp-campaign-links">
		<select name="latest-campaigns" id="latest-campaigns" data-width="100%" class="selectpicker btn-block text-center">
			<option data-hidden="true">Please select a Campaign</option>
			<?php foreach ($campaigns as $campaign) { ?>
			<option value="<?php echo get_permalink($campaign); ?>"><?php echo get_the_title($campaign); ?></option>
			<?php } ?>
		</select>
		<script type="text/javascript">
		<!--
		var dropdown = document.getElementById("latest-campaigns");
		function onCampChange() {
			if ( dropdown.options[dropdown.selectedIndex].value != 0 ) {
				location.href = dropdown.options[dropdown.selectedIndex].value;
			}
		}
		dropdown.onchange = onCampChange;
		-->
		</script>
	</div>
	
	<?php if ($radio_ads_active) { ?>
	<a name="radio-player" id="radio-player"></a>
	<div class="radio-adverts">
		<a href="#radio-player" id="call-2-action-radio" disabled="disabled" class="btn btn-default btn-block radio-campaign-link" title="<?php echo $radio_ads_title; ?>"><i class="fa fa-spinner fa-spin"></i><?php echo $radio_ads_title; ?></a>
		
		<div class="audio-files closed">
	
	<div class="audio-files-inner">
	
		<button id="close-audio-files" class="btn"><span class="sr-only">Close adverts</span><i class="fa fa-angle-double-up fa-lg"></i></button>

		<?php foreach ($radio_ads as $radio_ad) { ?>
		<dl>
			<dt><i class="fa fa-file-audio-o"></i> <?php echo $radio_ad['advert_title']; ?></dt>
			<dd><?php echo do_shortcode('[sc_embed_player_template1 fileurl="'.$radio_ad['advert_file']  .'"]'); ?></dd>
		</dl>
		<?php } ?>
	
		<?php if (count($radio_stations) > 0) { ?>
		<div class="logos">
		<?php foreach ($radio_stations as $radio_station) { ?>
			<figure class="img-logo">
				<a href="http://<?php echo $radio_station['station_url']; ?>" target="_blank" title="Go to <?php echo $radio_station['station_logo']['alt']; ?> website">
					<img src="<?php echo $radio_station['station_logo']['sizes']['thumbnail']; ?>" alt="<?php echo $radio_station['station_logo']['alt']; ?>">
				</a>
			</figure>
		<?php } ?>
		</div>
		<?php } ?>
	
	</div>
	
</div>
		
	</div>
	<?php } ?>	
	
</section>
<?php } ?>
