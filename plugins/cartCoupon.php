<h3 class="subtitle no-margin">What would you like to do next?</h3>
          <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		<div class="panel-group" id="accordion">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="#collapse-coupon" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" aria-expanded="true">Use Coupon Code 
							
							<i class="fa fa-caret-down"></i>
						</a>
					</h4>
				</div>
				<div id="collapse-coupon" class="panel-collapse collapse in" aria-expanded="true">
					<div class="panel-body">
						<label class="col-sm-2 control-label" for="input-coupon">Enter your coupon here</label>
						<div class="input-group">
							<input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control">
							<span class="input-group-btn"><input type="button" value="Apply Coupon" id="button-coupon" data-loading-text="Loading..." class="btn btn-primary"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="#collapse-shipping" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">Estimate Shipping &amp; Taxes 
							
							<i class="fa fa-caret-down"></i>
						</a>
					</h4>
				</div>
				<div id="collapse-shipping" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
					<div class="panel-body">
						<p>Enter your destination to get a shipping estimate.</p>
						<div class="form-horizontal">
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-country">Country</label>
								<div class="col-sm-10">
									<select name="country_id" id="input-country" class="form-control">
										<option value=""> --- Please Select --- </option>
										<option value="244">Aaland Islands</option>
										<option value="1">Afghanistan</option>
										<option value="2">Albania</option>
										<option value="3">Algeria</option>
									</select>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-zone">Region / State</label>
								<div class="col-sm-10">
									<select name="zone_id" id="input-zone" class="form-control">
										<option value=""> --- Please Select --- </option>
										<option value="3513">Aberdeen</option>
										<option value="3514">Aberdeenshire</option>
										<option value="3515">Anglesey</option>
										<option value="3516">Angus</option>
										<option value="3517">Argyll and Bute</option>
										<option value="3518">Bedfordshire</option>
										<option value="3519">Berkshire</option>
									</select>
								</div>
							</div>
							<div class="form-group required">
								<label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
								<div class="col-sm-10"><input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control"></div>
							</div>
								<button type="button" id="button-quote" data-loading-text="Loading..." class="btn btn-primary">Get Quotes</button>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a href="#collapse-voucher" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle collapsed" aria-expanded="false">Use Gift Certificate 
							
							<i class="fa fa-caret-down"></i>
						</a>
					</h4>
				</div>
				<div id="collapse-voucher" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
					<div class="panel-body">
						<label class="col-sm-2 control-label" for="input-voucher">Enter your gift certificate code here</label>
						<div class="input-group">
							<input type="text" name="voucher" value="" placeholder="Enter your gift certificate code here" id="input-voucher" class="form-control">
							<span class="input-group-btn"><input type="submit" value="Apply Gift Certificate" id="button-voucher" data-loading-text="Loading..." class="btn btn-primary"></span>
						</div>
					</div>
				</div>
			</div>
		</div>