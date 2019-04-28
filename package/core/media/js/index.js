import '../scss/aam.scss';

(function($){
    $('#aam').html(`
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-8">
                <div class="card">
                    <div class="card-header">Main Panel</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <ul class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action active">Feature 1</a>
                                    <a href="#" class="list-group-item list-group-item-action">Feature 2</a>
                                    <a href="#" class="list-group-item list-group-item-action">Feature 3</a>
                                    <a href="#" class="list-group-item list-group-item-action">Feature 4</a>
                                    <a href="#" class="list-group-item list-group-item-action">Feature 5</a>
                                    <a href="#" class="list-group-item list-group-item-action">Feature 6</a>
                                    <a href="#" class="list-group-item list-group-item-action">Feature 7</a>
                                    <a href="#" class="list-group-item list-group-item-action">Feature 8</a>
                                </ul>
                            </div>
                            <div class="col-md-8"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="card">
                    <div class="card-header">Panel 1</div>
                    <div class="card-body">
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">Panel 2</div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>
    `);
})(jQuery);