<div class="filters">
	@if(!empty($filters))

		<div id="staticdiv">
			<div id="contenttomove">
				<div class="row">
					@foreach($filters as $index => $filter)
						@if($filter['status'])
							<div class="{{$filter['classes']}}">
								@livewire("isite::filter-".$filter['type'], $filter, key($index.'-'.$filter['type']))
							</div>
						@endif
					@endforeach
				</div>

				<div class="filter-buttons d-flex justify-content-center my-2">
					@if($showBtnFilter)
						<button wire:click="updateItemsList" id="btnFilter" type="button" class="btnFilter btn btn-primary mx-2">{{trans('isite::frontend.buttons.filter')}}</button>
					@endif
					@if($showBtnClear)
						<button wire:click="clearValuesFilters" id="btnClear" type="button" class="btnClear btn btn-primary mx-2">{{trans('isite::frontend.buttons.clear')}}</button>
						{{--
						<button id="btnClear" type="button" class="btnClear btn btn-primary" onClick="window.livewire.emit('itemsListClearValues')">{{trans('isite::frontend.buttons.clear')}}</button>
						--}}
					@endif
				</div>

			</div>
		</div>

		<div class="modal  fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel"
			 aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">

					<div class="modal-header">
						<h5 class="modal-title">{{trans('isite::frontend.filters.title')}}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>

					<div class="modal-body" id="modal-body"></div>

				</div>
			</div>

		</div>

	@endif
</div>

@section('scripts-owl')
	@parent
	<script>

		$(document).ready(function () {

			function divtomodal() {
				var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
				if(width <= 992) {
					$('#modal-body').append($("#contenttomove"));
				} else {
					$('#staticdiv').append($("#contenttomove"));
				}
			}

			@if($showResponsiveModal)
				$(window).resize(divtomodal);
				var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
				if(width<=992)
					divtomodal()
			@endif


			/*
			* Listener Filters Close Modal
			*/
			@if($extraModalId)
				window.addEventListener('filters-close-modal', event => {
					$('#{{$extraModalId}}').modal('hide');
				})
			@endif

		});
	</script>

@stop