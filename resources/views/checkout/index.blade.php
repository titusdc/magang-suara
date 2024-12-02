@extends('layout.frontend')
@section('body')

<section class="contact_section ">
<form action="{{ url('/order') }}" method="POST" enctype="multipart/form-data">
    @csrf
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
</section>
  @endsection