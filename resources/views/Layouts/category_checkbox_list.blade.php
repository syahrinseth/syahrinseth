@if(count($BlogCategories) > 0)
    @php
    $category_php = array_filter($BlogCategories, function($category){
    @endphp
        @if($category->category == "php")
            return $category->category;
        @else
            return 0;
        @endif

    @php
    });
    @endphp

    @php
    $category_laravel = array_filter($BlogCategories, function($category){
    @endphp
        @if($category->category == "laravel")
            return $category->category;
        @else
            return 0;
        @endif

    @php
    });
    @endphp

    @php
    $category_terminal = array_filter($BlogCategories, function($category){
    @endphp
        @if($category->category == "terminal")
            return $category->category;
        @else
            return 0;
        @endif

    @php
    });
    @endphp

    @php
    $category_photography = array_filter($BlogCategories, function($category){
    @endphp
        @if($category->category == "photography")
            return $category->category;
        @else
            return 0;
        @endif

    @php
    });
    @endphp

    @if($category_php == "php")
        <div class="form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="category[]" value="php" checked>
            PHP
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
            </label>
        </div>
    @else
        <div class="form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="category[]" value="php">
            PHP
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
            </label>
        </div>
    @endif

    @if($category_laravel == "laravel")
        <div class="form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="category[]" value="laravel" checked>
            Laravel
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
            </label>
        </div>
    @else
        <div class="form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="category[]" value="laravel">
            Laravel
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
            </label>
        </div>
    @endif

    @if($category_php == "Terminal")
        <div class="form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="category[]" value="Terminal" checked>
            Terminal
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
            </label>
        </div>
    @else
        <div class="form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="category[]" value="Terminal">
            Terminal
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
            </label>
        </div>
    @endif

    @if($category_php == "photography")
        <div class="form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="category[]" value="photography" checked>
            Photography
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
            </label>
        </div>
    @else
        <div class="form-check">
            <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="category[]" value="photography">
            Photography
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
            </label>
        </div>
    @endif

@else
    <div class="form-check">
        <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="category[]" value="php">
        PHP
        <span class="form-check-sign">
            <span class="check"></span>
        </span>
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="category[]" value="laravel">
        Laravel
        <span class="form-check-sign">
            <span class="check"></span>
        </span>
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="category[]" value="terminal">
        Terminal
        <span class="form-check-sign">
            <span class="check"></span>
        </span>
        </label>
    </div>
    <div class="form-check">
        <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="category[]" value="photography">
        Photography
        <span class="form-check-sign">
            <span class="check"></span>
        </span>
        </label>
    </div>
@endif
