<div class="col-md-4">
    <div class="form-group">
      <label for="full_name">Full Name</label>
      <input type="text" value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="" id="full_name">
      @error('name')
      <span class="error invalid-feedback">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="gender">Gender</label>
     <select class="form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
        @forelse ($genderList as $value => $text)
            <option {{ old('gender') == $value ? "selected" : "" }} value="{{$value}}">{{$text}}</option>
        @empty
            <option value="" disabled>No options found</option>
        @endforelse
     </select>
     @error('gender')
     <span class="error invalid-feedback">{{ $message }}</span>
     @enderror
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
      <label for="phone">Phone Number</label>
      <input type="tel" value="{{old('phone')}}" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="" id="phone">
      @error('phone')
      <span class="error invalid-feedback">{{ $message }}</span>
      @enderror
    </div>
    </div>
 <div class="col-md-4">
    <div class="form-group @error('email') is-invalid @enderror">
      <label for="email">Email </label>
      <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="" id="email">
      @error('email')
      <span class="error invalid-feedback">{{ $message }}</span>
      @enderror
    </div>
    </div>
 <div class="col-md-4">
    <div class="form-group">
      <label for="address">Address </label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{old('address')}}" name="address" placeholder="" id="address">
      @error('address')
      <span class="error invalid-feedback">{{ $message }}</span>
      @enderror
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
      <label for="nationality">Nationality </label>
      <input type="text" class="form-control nationality @error('nationality') is-invalid @enderror" value="{{old('nationality')}}" name="nationality" placeholder="" id="nationality">
      @error('nationality')
      <span class="error invalid-feedback">{{ $message }}</span>
      @enderror
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
      <label for="date_of_birth">Date of birth </label>
      <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" value="{{old('date_of_birth')}}" name="date_of_birth" placeholder="" id="date_of_birth">
      @error('date_of_birth')
      <span class="error invalid-feedback">{{ $message }}</span>
      @enderror
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
      <label for="education_background">Educational Background </label>
      <textarea class="form-control @error('education_background') is-invalid @enderror" name="education_background" id="education_background">{{old('education_background')}}</textarea>
      @error('education_background')
      <span class="error invalid-feedback">{{ $message }}</span>
      @enderror
    </div>
    </div>
    <div class="col-md-4">
    <div class="form-group">
      <label for="prefered_contact_mode">Preffrerd contact mode</label>
     <select class="form-control  @error('prefered_contact_mode') is-invalid @enderror" name="prefered_contact_mode" id="prefered_contact_mode">
        @forelse ($preferedContactMode as $value => $text)
            <option {{ old('prefered_contact_mode') == $value ? "selected" : "" }} value="{{$value}}">{{$text}}</option>
        @empty
            <option value="" disabled>No options found</option>
        @endforelse
     </select>
     @error('prefered_contact_mode')
     <span class="error invalid-feedback">{{ $message }}</span>
     @enderror
    </div>
</div>
