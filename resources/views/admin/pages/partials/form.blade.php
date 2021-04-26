@csrf
<div>
    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ isset($model)? $model->title : '' }}" />
</div>

<div>
    <label for="url">URL</label>
    <input type="text" id="url" name="url" value="{{ isset($model)? $model->url : '' }}" />
</div>

<div>
    <div>
        <label>Order</label>
    </div>
    <div>
        <select name="order" id="order">
            <option value=""></option>
            <option value="before">Before</option>
            <option value="after">After</option>
            <option value="child">Child of</option>
        </select>
    </div>
    <div>
        <select name="orderPage" id="orderPage">
            <option value=""></option>
            @foreach( $orderPages as $page)
                <option value="{{ $page->id }}">{{ $page->title }}</option>
            @endforeach
        </select>
    </div>
</div>

<div>
    <label for="content">Content</label>
    <input type="text" id="content" name="content" value="{{ isset($model)? $model->content : '' }}" />
</div>

<div>
    <input type="submit" value="Submit" />
</div>