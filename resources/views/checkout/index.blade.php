@extends('layout.frontend')
@section('body')

<form action="{{ url('/order') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
      <input type="product_id" placeholder="Product_id" name='product_id' />
    </div>
    <div>
      <input type="text" placeholder="Name" name='name' />
    </div>
    <div>
      <input type="email" placeholder="Email" name='email' />
    </div>
    <div>
      <input type="number" placeholder="Number" name='number' />
    </div>
    <div>
        <input type="text" placeholder="Addres" name='addres' />
      </div>
    <div>
      <input type="text" class="Notes-box" placeholder="notes" name='notes' />
    </div>
    <div class="d-flex ">
      <button type="submit">
        SEND
      </button>
    </div>
  </form>
  @endsection