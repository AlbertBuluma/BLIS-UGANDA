@extends("layout")
@section("content")
<div>
	<ol class="breadcrumb">
		<li><a href="{{{URL::route('user.home')}}}">{{ trans('messages.home') }}</a></li>
		<li><a href="{{ URL::route('poc.index') }}">EID Patient list</a></li>
		<!-- <li><a href="{{ URL::route('bbincidence.bbfacilityreport') }}">Facility Report</a></li> -->
		<li class="active">New Patient </li>
	</ol>
</div>
<div class="panel panel-primary">
	<div class="panel-heading ">
		Facility:: {{Auth::user()->facility->name}} || Level:: {{Auth::user()->facility->level->level}} || {{Auth::user()->facility->district->name}}
	</div>
	<div class="panel-body">

		<!-- if there are creation errors, they will show here -->
		@if($errors->all())
		<div class="alert alert-danger">
			{{ HTML::ul($errors->all()) }}
		</div>
		@endif

		<div class="form-group actions-row" style="text-align:right;">
		</div>
		<div class="panel panel-primary">

			<!-- <h3 class="panel-title" style="text-align:center"><strong>FACILITY BIOSAFETY AND BIOSECURITY INCIDENT/OCCURENCE FORM</strong></h3> -->

			<div class="panel-heading "><strong>Patient Details</strong></div>
			<div class="panel-body">
				<div class="form-group">


				</br>
				<div class="form-group">
					{{ Form::label('infant_name', 'Infant Name', array('class' =>'col-sm-2 required ')) }}
					{{ Form::text('infant_name', Input::old('infant_name'), array('class' => 'form-control col-sm-4')) }}
				</div>

				<div class="form-group">
					{{ Form::label('gender', 'Gender:', array('class' =>'col-sm-2 required ')) }}
					<div class="radio-inline">{{ Form::radio('gender', 'Male', false) }} <span class="input-tag">Male</span></div>
					<div class="radio-inline">{{ Form::radio("gender", 'Female', false) }} <span class="input-tag">Female</span></div>
				</div>

				<!--<div class="form-group">
				{{ Form::label('personnel_dob', 'Date of Birth', array('class' =>'col-sm-2 required ')) }}
				{{ Form::text('personnel_dob', Input::old('personnel_dob'), array('class' => 'form-control standard-datepicker col-sm-4')) }} -->

				{{ Form::label('age', 'Age', array('class' =>'col-sm-2 required ')) }}
				{{ Form::text('age', Input::old('age'), array('class' => 'form-control col-sm-4', 'placeholder' => '(In months)')) }}
			</div>



			<div class="form-group">

				{{ Form::label('exp_no', 'Expo No.', array('class' =>'col-sm-2 ')) }}
				{{ Form::text('exp_no', Input::old('exp_no'), array('class' => 'form-control col-sm-4', 'placeholder' => 'If Status is not known')) }}

				{{ Form::label('breastfeeding_status', 'Is Mother Breastfeeding?', array('class' =>'col-sm-2')) }}
				<div class="radio-inline">{{ Form::radio('breastfeeding_status', 'Yes', false) }} <span class="input-tag">Yes</span></div>
				<div class="radio-inline">{{ Form::radio("breastfeeding_status", 'No', false) }} <span class="input-tag">No</span></div>
			</div>

			<div class="form-group">

				{{ Form::label('caretaker_number', 'Caretaker Tel. No.', array('class' =>'col-sm-2 ')) }}
				{{ Form::text('caretaker_number', Input::old('caretaker_number'), array('class' => 'form-control col-sm-4')) }}

				{{ Form::label('admimission_date', 'Admission Date', array('class' =>'col-sm-2 ')) }}
				{{ Form::text('admimission_date', Input::old('admimission_date'), array('class' => 'form-control standard-datepicker col-sm-4', 'placeholder' => 'Ignore if not admitted', )) }}
			</div>

			<div class="form-group">

				{{ Form::label('mother_name', 'Mothers Name', array('class' =>'col-sm-2 ')) }}
				{{ Form::text('mother_name', Input::old('mother_name'), array('class' => 'form-control col-sm-4')) }}

				{{ Form::label('mother_hiv_status', 'Mothers HIV Status', array('class' =>'col-sm-2 ')) }}
				{{ Form::select('mother_hiv_status',['','Positive', 'Negative','Unkown']) }}
			</div>

			<span>Entry Point <i>(Please select one)</i></span>
			<br>
			<br>

			<div class="form-group">
				{{ Form::label('entry_point', 'Infant PMTCT Codes: (Tick) :',array('class' =>'col-sm-2 required ')) }}
				<div class="radio-inline">{{ Form::radio("entry_point", 'nutrition', false) }} <span class="input-tag">Nutrition</span></div>
				<div class="radio-inline">{{ Form::radio("entry_point", 'pediatric_inpatient', false) }} <span class="input-tag">Pediatric Inpatient</span></div>
				<div class="radio-inline">{{ Form::radio("entry_point", 'mbcp', false) }} <span class="input-tag">MBCP/eMTCT</span></div>
				<div class="radio-inline">{{ Form::radio("entry_point", 'outpatient', false) }} <span class="input-tag">Outpatient</span></div>
				<div class="radio-inline">{{ Form::radio("entry_point", 'young_child_clinic', false) }} <span class="input-tag">Young Child Clinic</span></div>
				<div class="radio-inline">{{ Form::radio("entry_point", 'epi', false) }} <span class="input-tag">EPI</span></div>
			</div>
			<div class="form-group">
				{{ Form::label('entry_point', 'Other Entry Point(other than above):',array('class' =>'col-sm-2')) }}
				{{ Form::text('entry_point', Input::old('entry_point'), array('class' => 'form-control col-sm-4')) }}
			</div>

<span>For known HIV Exposed infants, information to enter on this Request Form should be picked from EI register. <br> For all other infants,
	use the inpatient register (HMIS 054)</span></div>
	<br>
	<span><strong>Note: R1 =</strong> Any repeat before 2nd PCR,
		<strong> R2 = </strong> Any repeat after 2nd PCR before 18 months
		<strong> 2nd PCR</strong> is done 6weeks after cessation of breastfeeding </span>
		<br><br>

		<div class="form-group">
			{{ Form::label('pcr_level', '1st or 2nd PCR? (Tick) :',array('class' =>'col-sm-2 required ')) }}
			<div class="radio-inline">{{ Form::radio('pcr_level', '1st PCR', false) }} <span class="input-tag">1st PCR</span></div>
			<div class="radio-inline">{{ Form::radio("pcr_level", '2nd PCR', false) }} <span class="input-tag">2nd PCR</span></div>
		</div>
		<br>

		{{ Form::label('pcr_level', 'Non Routine PCR; R1 / R2 (Tick):',array('class' =>'col-sm-2 required ')) }}
		<div class="radio-inline">{{ Form::radio('pcr_level', 'R1', false) }} <span class="input-tag">R1</span></div>
		<div class="radio-inline">{{ Form::radio("pcr_level", 'R2', false) }} <span class="input-tag">R2</span></div>
		<br>
		<br>

		<div class="form-group">
			<span>If Mother is HIV positive, Mother's PMTCT ARV's (Select & check circle)</span>
			<br>
			<br>

			{{ Form::label('pmtctarv', 'Mother PMTCTARVs:',array('class' =>'col-sm-2 required ')) }}
			{{ Form::select('pmtctarv', array_merge(array(null => 'Select...	'), $pmtctarv), Input::old('pmtctarv'), array('class' => 'form-control', 'id' => 'pmtctarv')) }}
		</div>

		<div class="form-group">
			{{ Form::label('mother_pmtctarv', 'Circle Number:', array('class' =>'col-sm-2')) }}
			<div class="radio-inline">{{ Form::radio('mother_pmtctarv', 'Lifelong ART', false) }} <span class="input-tag">Lifelong ART</span></div>
			<div class="radio-inline">{{ Form::radio("mother_pmtctarv", 'No ART', false) }} <span class="input-tag">No ART</span></div>
			<div class="radio-inline">{{ Form::radio("mother_pmtctarv", 'Unknown', false) }} <span class="input-tag">UNKNOWN</span></div>
		</div>

		<br>
		<br>

		<span>If known HEI, Infant's PMTCT ARVs (Select code:)</span>
		<br>
		<br>
		<div class="form-group">

			<div class="radio-inline">{{ Form::radio("infant_pmtctarv", 'Lifelong ART', false) }} <span class="input-tag">Daily NVP from birth to 6 weeks</span></div>
			<div class="radio-inline">{{ Form::radio("infant_pmtctarv", 'No ART', false) }} <span class="input-tag">NVP for 12 weeks for high risk infants</span></div>
			<div class="radio-inline">{{ Form::radio("infant_pmtctarv", 'Unknown', false) }} <span class="input-tag">No ARVs taken at birth</span></div>
			<div class="radio-inline">{{ Form::radio("infant_pmtctarv", 'Unknown', false) }} <span class="input-tag">UNKNOWN</span></div>
			<br>
			<br>
		</div>
	</div>

<div class="panel panel-primary">
	<div class="panel-heading "><strong>Sample Details</strong></div>
	<div class="panel-body">

		<div class="form-group">
			{{ Form::label('sample_id', 'Sample ID:',array('class' =>'col-sm-2 required ')) }}
			{{ Form::text('sample_id', Input::old('sample_id'), array('class' => 'form-control col-sm-4')) }}

			{{ Form::label('collection_date', 'Sample Collection Date:', array('class' =>'col-sm-2 ')) }}
			{{ Form::text('collection_date', Input::old('collection_date'), array('class' => 'form-control standard-datepicker col-sm-4', 'placeholder' => 'DD/ MM /YYYY')) }}
</div>
		<div class="form-group">
			{{ Form::label('requesting_officer', 'Requesting Clinician:', array('class' =>'col-sm-2 ')) }}
			{{ Form::text('requesting_officer', Auth::user()->name, array('class' => 'form-control col-sm-4', 'readonly')) }}

			{{ Form::label('clinician_phone', 'Mobile Number:', array('class' =>'col-sm-2 ')) }}
						{{ Form::text('clinician_phone', Auth::user()->phone_contact, array('class' => 'form-control col-sm-4', 'readonly')) }}
			<!-- {{ Form::text('collection_date', Input::old('collection_date'), array('class' => 'form-control standard-datepicker col-sm-4', 'placeholder' => 'DD/ MM /YYYY')) }} -->
		</div>

		<br>


			<div class="form-group actions-row" style="text-align:right;">
				{{ Form::button('<span class="glyphicon glyphicon-save"></span> '.'SAVE',
				['class' => 'btn btn-primary', 'onclick' => 'submit()']) }}
			</div>


			{{ Form::close() }}

		</div>

		@stop