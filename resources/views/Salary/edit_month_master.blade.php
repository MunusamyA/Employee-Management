@extends('layouts.app')
@section('main')
    <div class="d-flex justify-content-between">
        <div class="pt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="home.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Month Master</li>
                </ol>
            </nav>
        </div>
        <div><a href="{{ route('Month-Master-List') }}"><button type="button" class="btn btn-primary">List Month Mastre</button></a></div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Month Master Edit</h5>
        </div>
        
        <form action="{{ route('Edit-Month-Master',$edit_month_master->id) }}" method='POST' enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row mb-3">
                    <label for="sal_month" class="form-label col-md-2 mt-1">Month</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" name="sal_month" id="sal_month" placeholder="" readonly value="{{ $edit_month_master->sal_month }}">
                    </div>
                    <label for="sal_year" class="form-label col-md-2 mt-1">Year</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control " name="sal_year" readonly id="sal_year" placeholder="" value="{{ $edit_month_master->sal_year }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sal_tot_days" class="form-label col-md-2 mt-1">Total Days</label>
                    <div class="col-md-4">
                        <input type="text"  class="form-control" id="sal_tot_days" readonly name="sal_tot_days" placeholder="" value="{{ $edit_month_master->sal_tot_days }}">
                    </div>
                    <label for="sal_holy_days" class="form-label col-md-2 mt-1">HolyDays</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control number_only @error('sal_holy_days') is-invalid @enderror" name="sal_holy_days" id="sal_holy_days" maxlength='2' placeholder="Enter this Month Holy days" value="{{ old('sal_holy_days',$edit_month_master->sal_holy_days) }}">
                        @error('sal_holy_days')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="sal_work_days" class="form-label col-md-2 mt-1">Working Days</label>
                    <div class="col-md-4">
                        <input type="text" class="form-control" readonly name="sal_work_days" id="sal_work_days" placeholder="Total No. of Working Days" value="{{$edit_month_master->sal_work_days}}">         
                    </div>
                </div>
            
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="button" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>
    <script>
        
        $(document).ready(function () {	
            $('.number_only').on('input', function () {
                $(this).val($(this).val().replace(/[^0-9]/g, ''));
            });
        });
        $(document).on('change', '#sal_holy_days', function () {
            var sal_tot_days = Number($('#sal_tot_days').val());
            var sal_holy_days = Number($(this).val());

            if (sal_holy_days > sal_tot_days) {
                alert('Please enter a value less than or equal to the total days.');
                $(this).val('').focus();
                $('#sal_work_days').val('').prop('disabled', true);
                return false;
            }
            var working_days = sal_tot_days - sal_holy_days;
            $('#sal_work_days').val(working_days).prop('disabled', false);
        });
    </script>
@endsection