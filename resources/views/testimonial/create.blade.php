@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Testimonial</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('testimonial.store', $alumni) }}">
                        @csrf

                        <div class="form-group">
                            <label for="testimonial_text">Testimonial</label>
                            <textarea class="form-control @error('testimoni') is-invalid @enderror" 
                                id="testimoni" 
                                name="testimoni" 
                                rows="4" 
                                required>{{ old('testimoni') }}</textarea>
                            @error('testimoni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Testimoni') }}</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control @error('tgl_testimoni') is-invalid @enderror" 
                                       name="tgl_testimoni" value="{{ old('tgl_testimoni') }}" required>
                                @error('tgl_testimoni')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection