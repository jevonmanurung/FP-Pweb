@extends('layouts.sidebar')
<style>
.button {
      background-color: #4caf50;
      padding: 15px;
      text-align: center;
      font-size: 18px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      transition: background-color 0.3s, transform 0.2s ease-in-out;
    }

    .button:hover {
      background-color: #45a049;
      transform: translateY(-3px);
    }

    .button:active {
      transform: translateY(0);
    }
</style>

@section('content')
  <div class="main-content">
    <div class="d-flex justify-content-center align-items-center flex-column h-100">
      <div class="button mb-4 w-75">
        <a href="transactions" class="btn" style="font-size: 18px;">Transaction List</a></div>
      <div class="button mb-4 w-75" action="/transactions/create">
        <a href="transactions/create" class="btn" style="font-size: 18px;">Create New Transaction</a></div>
      <div class="button mb-4 w-75" action="/view_product">
        <a href="view_product" class="btn" style="font-size: 18px;">Manage Product</a></div>
    </div>
  </div>
@endsection
