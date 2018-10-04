<div class="form-group">
	<label for="{{ $id }}">{{ $label }}</label>
	<input @isset($readonly) @if($readonly == true) readonly="readonly" @endif @endisset name="{{ isset($name) ? $name : $id }}" type="number" class="form-control" id="{{ $id }}" placeholder="{{ $label }}" value="{{ old($id) ? (!isset($name) ? old($id) : old($id)[$index]) : (isset($value) ? $value : '') }}">
</div>