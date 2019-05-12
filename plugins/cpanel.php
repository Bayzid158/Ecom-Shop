<!-- Cpanel Block -->
<div id="sp-cpanel_btn" class="isDown visible-lg">
	<i class="fa fa-cog"></i>
</div>		
<div id="sp-cpanel" class="sp-delay">
	<h2 class="sp-cpanel-title"> Demo Options <span class="sp-cpanel-close"> <i class="fa fa-times"> </i></span></h2>
	<div id="sp-cpanel_settings">
		<div class="panel-group">
			<label>Color Scheme</label>
			<div class="group-schemes" >
				<a data-scheme="default" title="Orange"  data-toggle="tooltip" class="item_scheme selected"><span style="background: #e8622d;"></span></a>
				<a data-scheme="blue" title="Blue"  data-toggle="tooltip" class="item_scheme"><span style="background: #478bca;"></span></a>
				<a data-scheme="boocdo"  title="Boocdo"  data-toggle="tooltip" class="item_scheme"><span style="background: #e54e4e;"></span></a>
				<a data-scheme="cyan" title="Cyan"  data-toggle="tooltip" class="item_scheme"><span style="background: #1ea181;"></span></a>
				<a data-scheme="green" title="Green" data-toggle="tooltip" class="item_scheme "><span style="background: #52a633;"></span></a>
				
			 </div>
		</div>
		
		<div class="panel-group ">
			<label>Header style</label>
			<div class="group-boxed">
				<select id="change_header_type" name="cpheaderstype" class="form-control" onchange="headerTypeChange(this.value);">
					<option value="header-home1" >Header 1</option>
					<option value="header-home2" >Header 2</option>
					<option value="header-home3" >Header 3</option>
					<option value="header-home4" >Header 4</option>
					<option value="header-home5" >Header 5</option>
					<option value="header-home6" >Header 6</option>
					<option value="header-home8" >Header 8</option>
				</select>
			</div>
		</div>
		
		
		<div class="panel-group ">
			<label>Layout Box</label>
			<div class="group-boxed">
				<select id="cp-layoutbox" name="cplayoutbox" class="form-control" onchange="changeLayoutBox(this.value);">
					<option value="full">Wide</option>
					<option value="boxed">Boxed</option>
					<option value="iframed">Iframed</option>
					<option value="rounded">Rounded</option>
				</select>
			</div>
		</div>
		
        <div class="panel-group">
			<label>Body Image</label>
			
			<div class="group-pattern">
								<div data-pattern="28"  class="img-pattern"><img src="image/theme/patterns/28.png" alt="pattern 28"></div>
								<div data-pattern="29"  class="img-pattern"><img src="image/theme/patterns/29.png" alt="pattern 29"></div>
								<div data-pattern="30"  class="img-pattern"><img src="image/theme/patterns/30.png" alt="pattern 30"></div>
								<div data-pattern="31"  class="img-pattern"><img src="image/theme/patterns/31.png" alt="pattern 31"></div>
								<div data-pattern="32"  class="img-pattern"><img src="image/theme/patterns/32.png" alt="pattern 32"></div>
								<div data-pattern="33"  class="img-pattern"><img src="image/theme/patterns/33.png" alt="pattern 33"></div>
								<div data-pattern="34"  class="img-pattern"><img src="image/theme/patterns/34.png" alt="pattern 34"></div>
								<div data-pattern="35"  class="img-pattern"><img src="image/theme/patterns/35.png" alt="pattern 35"></div>
								<div data-pattern="36"  class="img-pattern"><img src="image/theme/patterns/36.png" alt="pattern 36"></div>
								<div data-pattern="37"  class="img-pattern"><img src="image/theme/patterns/37.png" alt="pattern 37"></div>
								<div data-pattern="38"  class="img-pattern"><img src="image/theme/patterns/38.png" alt="pattern 38"></div>
								<div data-pattern="39"  class="img-pattern"><img src="image/theme/patterns/39.png" alt="pattern 39"></div>
								<div data-pattern="40"  class="img-pattern"><img src="image/theme/patterns/40.png" alt="pattern 40"></div>
								<div data-pattern="41"  class="img-pattern"><img src="image/theme/patterns/41.png" alt="pattern 41"></div>
								<div data-pattern="42"  class="img-pattern"><img src="image/theme/patterns/42.png" alt="pattern 42"></div>
								<div data-pattern="43"  class="img-pattern"><img src="image/theme/patterns/43.png" alt="pattern 43"></div>
								<div data-pattern="44"  class="img-pattern"><img src="image/theme/patterns/44.png" alt="pattern 44"></div>
								<div data-pattern="45"  class="img-pattern"><img src="image/theme/patterns/45.png" alt="pattern 45"></div>
							</div>
			<p class="label-sm">Background only applies for Boxed,Framed, Rounded Layout</p>
		</div>
		
		<div class="reset-group">
		    <a href="index-2.php" class="btn btn-success " onclick="ResetAll()">Reset</a>
		</div>
		
	</div>

</div>

<link rel='stylesheet' property='stylesheet'  href='css/themecss/cpanel.css' type='text/css' media='all' />