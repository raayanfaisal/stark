@extends('layouts.app')

@section('content')
<div class="menu-strip">
	<div class="button">
		<button class="btn invoice-btn" data-toggle="modal" data-target="#exampleModal">Add invoice</button>
		<button class="btn invoice-btn" onclick="window.print()">Print Quotation</button>
		<button class="btn invoice-btn" onclick="window.print()">Print Invoice</button>
	</div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add invoice data</h5>
				<button type="button" class="close invoice-btn" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-row">
						<div class="col">
						<input type="text" id="code" class="form-control" placeholder="Enter item code">
						</div>
						<div class="col">
						<input type="text" id="width" class="form-control" placeholder="Enter width in Ft">
						</div>
						<div class="col">
						<input type="text" id="height" class="form-control" placeholder="Enter height in Ft">
						</div>
						<div class="col">
						<input type="text" id="qtyi" class="form-control" placeholder="Enter QTY">
						</div>
						<div class="col">
						<input type="text" id="hqty" class="form-control" placeholder="Enter Hardware QTY">
						</div>
					</div>
					<div class="form-row mt-3">
						<div class="col">
							<input type="text" id="length" class="form-control" placeholder="Enter packing feet">
						</div>
					</div>
					<div class="form-row">
						<div class="col">
							<select class="form-control mt-3" name="product" id="product">
								<option value="0"></option>
								@foreach($itms as $itms)
									<option value="{{ $itms->itmValue }}">{{ $itms->itmDescription }}</option>
								@endforeach
							</select>
						</div>
						<div class="col">
							<input type="text" class="form-control mt-3" id="gst" placeholder="gst">
						</div>

						<div class="col">
							<input type="text" class="form-control mt-3" id="profitpercent" placeholder="profit">
						</div>
						<div class="col">
							<select class="form-control mt-3" name="ptype" id="ptype">
								<option value="0"></option>
								<option value="2.5">Side Packing</option>
								<option value="2.5">Outer Frame Side Packing</option>
								<option value="2.5">Sash Packing</option>
								<option value="2.5">Outer Frame Packing</option>
								<option value="2.5">U Packing</option>
								<option value="2">Wool Packing</option>
							</select>
						</div>
					</div>
					<div class="form-row">
						<div class="col">
						<select class="form-control mt-3" name="accessories" id="accessories">
								<option value="0"></option>
								<option value="435">HANDLE LOCK - WHITE</option>
								<option value="450">HANDLE LOCK - BLACK</option>
								<option value="95">SLIDE DOOR LOCK</option>
								<option value="125">SLIDE DOOR LOCK WITH KEY</option>
								<option value="90">HOOK LOCK</option>
								<option value="95">DEAD LOCK</option>
								<option value="30">WINDOW HANDLE (LEFT)</option>
								<option value="30">WINDOW HANDLE (RIGHT)</option>
								<option value="30">SLIDING DOOR CATCHS</option>
								<option value="28">SLIDING DOOR HANDLE</option>
								<option value="35">DOOR HANDLE V TYPE</option>
								<option value="55">DOOR HANDLE SLIDE TYPE</option>
								<option value="25">TOWEL BOLT 6"</option>
								<option value="20">TOWEL BOLT 4"</option>
								<option value="80">FULSH BOLT</option>
								<option value="285">DOOR CLOSER WHITE</option>
								<option value="245">DOOR CLOSER SILVER COLOUR</option>
								<option value="50">HINGES 4" (SS COLOUR)</option>
								<option value="35">HINGES 4" (WHITE COLOUR)</option>
								<option value="85">FRICTION STAY 16"</option>
								<option value="70">FRICTION STAY 12"</option>
								<option value="60">FRICTION STAY 10"</option>
								<option value="50">FRICTION STAY 8"</option>
								<option value="14">SLIDING WINDOW WEEL</option>
								<option value="2.5">SIDE PACKING PER FEET</option>
								<option value="2.5">OUTER FRAME SIDE PACKING PER FEET</option>
								<option value="2.5">U PACKING PER FEET</option>
								<option value="2">WOOL PACKING</option>
								<option value="0.5">TOP GIDE</option>
								<option value="100">ALUMINIUM HOLLOW HANDEL</option>
								<option value="100">SS HOLLOW HANDEL</option>
								<option value="0.5">RIVETS</option>
								<option value="0.25">SS SCREW 1/2"</option>
								<option value="0.5">SS SCREW 1/4"</option>
								<option value="1">SS SCREW 1"</option>
								<option value="1">SS SCREW 1*1/2"</option>
								<option value="1.5">SS SCREW 2"</option>
								<option value="1.5">SS SCREW 2*1/2"</option>
							</select>
						</div>
					</div>

					<input type="button" class="mt-3 btn btn-primary btn-lg btn-block" value="Calculate" onclick="Price()"><br>


				</form>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="invoice">
	<img src="img/logo.png" class="mt-5 mb-3" alt="logo" width="100px" height="100px">
			<div class="customer-address">
				<div class="heading-client">
					<h6>Customer Details</h6>
				</div>
				<textarea class="form-control" name="customer Address" id="address" cols="50" rows="20"></textarea>
			</div>
			<div class="addressing">
			<ul>
					<li>KAALI INVESTMENT PVT LTD</li>
					<li>H.SOSANVILLA 3rd FLOOR</li>
					<li>MALE'</li>
					<li>REP OF MALDIVES</li>
					<li>TIN NO : 1111445GST501</li>
					<li>PHONE NO : 7723242 / 7782704</li>
				</ul>
			</div>
            <table id="invoiceTable" class="table mt-5">
              <tr>
                <th>Item</th>
                <th>Details</th>
				<th>Rate</th>
				<th>Qty</th>
				<th>Total</th>
              </tr>
			  <tr>
              </tr>
            </table>
			<div class="totalArea mt-5">
				<div id="gstpercent"></div>
				<div id="displaySubttl"></div>
				<div id="totalAmount"></div>

			</div>
			<div class="quote-prices-section">
			</div>
			<div class="remarks-field">
				<h5 class="rmks">
					Remarks : <input class="form-control" type="text" id="Remarks">
				</h5>
				<P>BML MRF 7704-263980-001</P>
				<P>BML USD 7704-263980-002</P>
			</div>
	</div>
</div>

@endsection