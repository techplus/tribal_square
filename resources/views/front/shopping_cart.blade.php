@extends('layouts.front')
@section('content')
	<div class="page-wrap">
		<div id="page-content-wrapper">
			<div class="row header_wrap">
				@include('layouts.front_navbar')
				<!-- Keep all page content within the page-content inset div! -->
			      <div class="page-content">
			        <div class="row">
			          <div class="col-sm-12"> 
			            <h1>Shopping Carts
			            @if( !empty( $aProducts ) )
			            	<span class="pull-right">
			              		<a href="{{action('ShoppingCartsController@getPaypalCheckOut')}}" class="paypal"><img src="{{ url('images/paypal_btn.png') }}" alt="" class="img-resposnsive"></a>
			            	</span>
			            @endif
			            </h1>
			            
			            <div class="clearfix"></div>

           
					    <div class="row shopping_cart_wrap">
					        <div class="col-sm-12 col-md-12 table-responsive">
					            <table class="table table-hover table-striped">
					                <thead>
					                    <tr>
					                        <th>Product</th>
					                        <th>Quantity</th>
					                        <th> </th>
					                        <th class="text-center">Price</th>
					                        <th class="text-center">Total</th>					                        
					                    </tr>
					                </thead>
					                <tbody>								                			                				               
					                	@if( !empty($aProducts) )
					                		<?php
					                			$p_total = 0;
					                			$sub_total = 0;
					                			$estimated_shipping = 12;
					                		?>
					                		@foreach( $aProducts as $key => $aProduct )					                			
					                			<tr class="products" data-id="{{ $aProduct['id'] }}" data-key="{{ $key }}" data-quantity="{{ $aProduct['quantity'] }}">
							                        <td class="col-sm-8 col-md-8">
							                        <div class="media">
							                            <a class="thumbnail pull-left" href="http://localhost/tribal_square/search/deals/{{ $aProduct['id'] }}"> <img class="media-object" src="{{ $aProduct['image_path'] }}" style="width: 72px; height: 72px;"> </a>
							                            <div class="media-body">
							                                <h4 class="media-heading"><a href="#">{{ $aProduct['title'] }}</a></h4>
							                                <!-- <h5 class="media-heading"> by <a href="#">Brand name</a></h5> -->
							                                <!-- <span>Status: </span><span class="text-success"><strong>In Stock</strong></span> -->
							                            </div>
							                        </div></td>
							                        <td class="col-sm-1 col-md-1" style="text-align: center">
							                        	<input type="text" class="form-control quantity" value="{{ $aProduct['quantity'] }}" style="margin-top:0;">							                        	
							                        </td>
							                        <td  class="col-sm-1 col-md-1">
							                        	<button type="button" class="btn btn-sm custome_blue_btn refresh-product">
							                            	<span class="glyphicon glyphicon-refresh"></span> 
							                        	</button>
							                        	<button type="button" class="btn btn-sm custome_blue_btn remove-product">
							                            	<span class="glyphicon glyphicon-remove"></span> 
							                        	</button>
							                        </td>
							                        <td class="col-sm-1 col-md-1 text-center"><strong>$<span class="price">{{ $aProduct['new_price'] }}</span></strong></td>
							                        <?php 
							                        	$p_total = $aProduct['new_price'] * $aProduct['quantity'];
							                        	$sub_total += $p_total;
							                         ?>
							                        <td class="col-sm-1 col-md-1 text-center"><strong>$<span class="product_total">{{ $p_total }}</span></strong></td>
							                        <td class="col-sm-1 col-md-1">
							                        </td>
							                    </tr>							                   
											@endforeach
														                   					                 
					                    <tr>
					                        <td>   </td>
					                        <td>   </td>
					                        <td>   </td>
					                        <td><h5>Subtotal</h5></td>
					                        <td class="text-right"><h5><strong>$<span  class="sub_total">{{ $sub_total }}</span></strong></h5></td>
					                    </tr>
					                    <tr>
					                        <td>   </td>
					                        <td>   </td>
					                        <td>   </td>
					                        <td><h5>Estimated shipping</h5></td>
					                        <td class="text-right"><h5><strong>$<span class="estimated_shipping">{{ $estimated_shipping }}</span></strong></h5></td>
					                    </tr>
					                    <tr>
					                        <td>   </td>
					                        <td>   </td>
					                        <td>   </td>
					                        <td><h3>Total</h3></td>
					                        <td class="text-right"><h3><strong>$<span class="main_total">{{ $sub_total + $estimated_shipping }}</span></strong></h3></td>
					                    </tr>
					                    @else
					                    	<tr>
					                    		<td colspan="6">
					                    			No Products in your shopping bag.
					                    		</td>
					                    	</tr>
					                    @endif						                    
					                    <tr>
					                        <td>
					                        <a href="{{ url('search/deals') }}"><button type="button" class="btn btn-md custome_blue_btn">
					                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
					                        </button></a></td>
					                        <td>   </td>
					                        <td>   </td>
					                        <td>   </td>
					                        @if( !empty( $aProducts ) )
						                        <td class="text-right">
						                          <a href="{{action('ShoppingCartsController@getPaypalCheckOut')}}" class="paypal"><img src="{{ url('images/paypal_btn.png') }}" alt=""></a>
						                        </td>
					                        @else
					                        	<td>   </td>
					                        @endif
					                    </tr>
					                </tbody>
					            </table>
					        </div>
					    </div>

          			</div>
        		</div>
      		</div>
    	</div>
  </div>
  <script>
  		$(document).ready(function(){

  			$('.quantity').on('change',function(){
  				if ( ! ($(this).val()).match(/^\d+$/) ) {
				    $(this).val('');
				    return false;
				}
  			});

  			$('.refresh-product').on('click',function(){
  				var send_call = 1;
  				if( $(this).parents('tr').data('quantity') == $(this).parents('tr').find('.quantity').val() )
  				{
  					send_call = 0;
  					alert( "Product is already with updated deatils" );
  				}
  				if( $(this).parents('tr').find('.quantity').val().length <= 0 )
  				{
  					send_call = 0;
  					alert("New quantity must has value");
  				}  				
  				if( send_call )
  				{
  					var id = $(this).parents('tr').data('id');
  					var key = $(this).parents('tr').data('key');
  					var new_quantity = $(this).parents('tr').find('.quantity').val();
  					var price = $(this).parents('tr').find('.price').html();  					
  					var $this = $(this);
  					var old_total = $this.parents('tr').find('.product_total').html();  					
  					
  					$.ajax({
  						url : "{{ url('shopping-cart/change-quantity') }}",
  						type : "post",
  						data : { id : id , key : key , new_quantity : new_quantity },
  						dataType : "json",
  						success : function(json)
  						{
  							var p_total =  parseFloat(price) * parseInt(new_quantity);
  							var sub_total = parseFloat( $('.sub_total').html() );  							  						
  							sub_total -= parseFloat(old_total);
  							sub_total += p_total;
  							var main_total = sub_total + parseFloat( $('.estimated_shipping').html() );
  							
  							$this.parents('tr').find('.product_total').html( p_total );
  							$('.sub_total').html(sub_total);  							
  							$('.main_total').html( main_total );
  						},
  						error : function(xhr, status, error)
  						{
  							alert(xhr.responseText);
  						}
  					});
  				}
  			});
  			$('.remove-product').on('click',function(){
  					var id = $(this).parents('tr').data('id');
  					var key = $(this).parents('tr').data('key');  					  					  					
  					var $this = $(this);
  					var old_total = $this.parents('tr').find('.product_total').html();
  					$.ajax({
  						url : "{{ url('shopping-cart/remove-product') }}",
  						type : "post",
  						data : { id : id , key : key },
  						dataType : "json",
  						success : function(json)
  						{  		
  							$this.parents('tr').remove();					
  							var sub_total = parseFloat( $('.sub_total').html() ).toFixed(2);
  							sub_total -= parseFloat(old_total);  							  							
  							$('.sub_total').html(sub_total);
  							if( $('tr.products').length > 0 )
  							{  				
  								$('.no_of_items').html(' My Cart ( '+ $('tr.products').length +' Items )');				
  								$('.main_total').html( sub_total + parseFloat( $('.estimated_shipping').html() ) );
  							}  	
  							else
  							{
  								$('.no_of_items').html(' My Cart');	
  								$('table tbody tr').not(':last').remove();  								
  								/*$('.estimated_shipping').html('0');
  								$('.main_total').html('0');*/
  								$('.paypal').hide();
  							}						
  						},
  						error : function(xhr, status, error)
  						{
  							alert(xhr.responseText);
  						}
  					});
  			});
  		});
  </script>
@endsection