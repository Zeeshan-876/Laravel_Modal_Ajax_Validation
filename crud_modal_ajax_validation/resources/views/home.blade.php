@extends('layouts.app')

@section('content')

<!-- Add Book Modal -->
<div class="modal fade" id="AddNewBookModel" tabindex="-1" role="dialog" 
  aria-labelledby="book_title" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="book_title"></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <form id="book-form" autocomplete="on">
               {{ csrf_field() }}
            <label for="">Book Name</label>
            <input type="text" name="book_name" placeholder="Book Name" class="form-control" required>

            <label for="">Author Name</label>
            <input type="text" name="author_name" placeholder="Author Name" class="form-control" required>

            <label for="">Price</label>
            <input type="number" name="price" placeholder="Price" class="form-control" required>

            <label for="">Publish By</label>
            <input type="text" name="publish_by" placeholder="Publish By" class="form-control" required>

            <label for="">Pages</label>
            <input type="number" name="pages" placeholder="Pages" class="form-control" required>

            <label for="">Publish Date</label>
            <input type="date" name="publish_date"  class="form-control" required>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="save_book" class="btn btn-success ">Save</button>
        </div>
    </form>
      </div>
    </div>
  </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h2 class="text-center">{{ __('Book List') }}</h2></div>
                <div class="card-body">
                    <div id="show_message"></div>
                    <div class="row float-right mr-4" id="open_book_modal"><button class="btn btn-primary ">+Add</button></div>
                    <br><br>
                    <div class="row col-md-12">
                        <table  class="table table-center table-bordered">
                         <thead>
                             <tr>
                                 <th>Book ID</th>
                                 <th>Book Name</th>
                                 <th>Author Name</th>
                                 <th>Price</th>
                                 <th>Publish By</th>
                                 <th>Publish Date</th>
                                 <th>Pages</th>
                                 <th>Action</th>
                            </tr>
                        </thead>

                        <tbody id="tbody">
                            
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

  <script>
      $(document).on('click','#open_book_modal',function(e){
        e.preventDefault();
        $('#book_title').html("Book Form");
        $('#AddNewBookModel').modal('show');
      });

      $(document).on('click','#save_book',function(e){
          e.preventDefault();
          $.ajax({
            type: "post",
            url: "add-book",
            data: $('#book-form').serialize(),
            success: function (response) {
              console.log(response);
              $('#show_message').addClass('alert alert-success');
              $('#show_message').html("Record Added.");
              $('#AddNewBookModel').modal('hide');
            },
            error:function(er){
              alert("Something Wrong");
              console.log(er);
            }
          });
      });
  </script>