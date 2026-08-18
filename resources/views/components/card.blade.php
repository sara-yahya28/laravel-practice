{{-- merging html attrbs with what will user create,
making 'cards' default ones  --}}
<div {{$attributes->merge(['class'=>'card'])}}>
    {{$slot}}
</div>