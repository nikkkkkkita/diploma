<div class="range-wrapper">
    <div class="price-input">
       <div class="field">
           <span>Мин</span>
           <input type="number" class="input-min" value="{{ $priceMin }}">
       </div>
        <div class="field">
            <span>Макс</span>
            <input type="number" class="input-max" value="{{ $priceMax }}">
        </div>
    </div>

    <div class="range-slider">
        <div class="progress-bar"></div>
    </div>
    <div class="range-input">
        <input type="range" class="range-min" min="{{$priceMin}}" max="{{$priceMax}}" value="{{$priceMin}}" wire:model.change="priceMin">
        <input type="range" class="range-max" min="{{$priceMin}}" max="{{$priceMax}}" value="{{$priceMax}}" wire:model.change="priceMax">
    </div>

</div>
