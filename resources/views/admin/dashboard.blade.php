@extends('admin.layouts.app')

@section('content')
	<div class="row">
		<div class="col-lg-12">
			<div>
				<form action="{{ action('Admin\PortfolioController@store') }}" method="post"
					enctype="multipart/form-data">
					@csrf
					<div class="row" id="parent">
						<div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option>Select Type...</option>
                                    <option value="Lease">Lease</option>
                                    <option value="Regular">Regular</option>
                                </select>
                            </div>
                        </div>
						<div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="identities">Identities</label>
                                <select style="width:100%" class="form-control select2" name="identities[]" multiple="multiple">
									<option value="Bathroom">Bathroom</option>
									<option value="Bedroom">Bedroom</option>
									<option value="Dining">Dining</option>
									<option value="Toilet">Toilet</option>
								</select>
                            </div>
                        </div>
						<div class="col-md-12 col-sm-12 text-left" id="submit">
							<div class="form-group">
								<button class="btn btn-primary">Search Item</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	<script>
		function createField(title){
			return ` <div class="col-md-3 col-sm-12 dynamic" data-title="${title}"> <div class="form-group"> <label for="${title}">${title}</label> <input type="number" min="0" name="${title}" id="${title}" placeholder="" class="form-control"> </div> </div>`
		}
		$(document).ready(function(){
			let createdFieldIds = [];
			$('.select2').on('change',function(){
				let selectedIntities = $('.select2').find(':selected');
				let selectedFieldIds = [];
				for(let i=0;i<selectedIntities.length;i++) selectedFieldIds.push(selectedIntities[i].text);
				
				for(let i=0;i<createdFieldIds.length;i++){
					if(!selectedFieldIds.includes(createdFieldIds[i])){
						$("div").find("[data-title='" + createdFieldIds[i] + "']").remove();
						createdFieldIds.splice(i,1); 
					}
				}
				for(let i=0;i<selectedIntities.length;i++){
					createdFieldIds.push(selectedIntities[i].text);
					if(!$('#'+selectedIntities[i].text).length){
						$("#submit").before(createField(selectedIntities[i].text));
					}
				}
			})
		});
	</script>
@endsection