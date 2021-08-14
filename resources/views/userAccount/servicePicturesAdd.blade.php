@extends('userAccount.layouts.beyond')

@section('breadcrumb')
  <li><i class="fa fa-fw fa-home"></i> <a href="{{ request()->root() }}">الرئيسية</a></li>
  <li><a href="{{ request()->root() }}/userAccount">حسابي</a></li>
  <li><a href="{{ request()->root() }}/userAccount/services">خدماتي</a></li>
  <li class="breadcrumb-item active">إضافة خدمة جديدة</li>
@endsection

@section('header-title')
    <i class="fa fa-fw fa-plus" aria-hidden="true"></i> إضافة خدمة جديدة
@endsection

@section('row-title')
  <h5 class="row-title">
    <i class="fa fa-fw fa-plus" aria-hidden="true"></i> إضافة خدمة جديدة
  </h5>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
        <div class="widget radius-bordered">
          <div class="widget-header bordered-bottom bordered-palegreen">
              <span class="widget-caption"> اسم الخدمة: {{ $service->name }} </span>
              <div class="widget-buttons">
                  <a href="#" data-toggle="config">
                      <i class="fa fa-cog yellow"></i>
                  </a>
                  <a href="#" data-toggle="maximize">
                      <i class="fa fa-expand pink"></i>
                  </a>
                  <a href="#" data-toggle="collapse">
                      <i class="fa fa-minus blue"></i>
                  </a>
                  <a href="#" data-toggle="dispose">
                      <i class="fa fa-times darkorange"></i>
                  </a>
              </div>
          </div>

          <div class="widget-body">

            <div id="simplewizard" class="wizard" data-target="#simplewizard-steps">
                <ul class="steps">
                    <li onclick="window.open('{{ $service->getUrl('forUser') }}/add')" style="cursor: pointer;"><span class="step">1</span>بيانات الخدمة<span class="chevron"></span></li>
                    <li class="active"><span class="step">2</span>صور الخدمة<span class="chevron"></span></li>
                    <li onclick="window.open('{{ $service->getUrl('forUser') }}/add/extras')" style="cursor: pointer;"><span class="step">3</span>إضافات للخدمة<span class="chevron"></span></li>
                    <li onclick="window.open('{{ $service->getUrl('forUser') }}')" style="cursor: pointer;"><span class="step">4</span>نشر الخدمة<span class="chevron"></span></li>
                </ul>
            </div>
            <div class="step-content" id="simplewizard-steps">
                <div class="step-pane active" id="simplewizardstep2">
                  @if(session('done'))
                  <div class="alert alert-success fade in">
                      <button class="close" data-dismiss="alert">
                          ×
                      </button>
                      <i class="fa-fw fa fa-check"></i>
                      تمت إضافة الخدمة <strong>بنجاح</strong>
                  </div>

                  <p>يمكنك الآن:</p>
                  <ul>
                    <li>
                      رفع صور توضيحية أو إعلانية للخدمة لجذب طالبي الخدمة لخدمتك
                      <a href="{{ session('service')->getUrl('forUser','addPictures') }}"> أضف صور إلى خدمتي </a>
                    </li>
                    <li>
                      عمل إضافات للخدمة بمبالغ إضافية، لتنويع الخيارات لطالب الخدمة
                      <a href="{{ session('service')->getUrl('forUser','addExtras') }}"> أضف إضافات إلى خدمتي </a>
                    </li>
                    <li>
                      نشر الخدمة مباشرة
                      <a href="{{ session('service')->getUrl('forUser','publish') }}"> نشر الخدمة مباشرة </a>
                    </li>
                  </ul>
                  @else
                    <div id="addServiceForm">

                        <div class="dashboard-box">
                                        <div class="box-header">
                                            <div class="deadline">
                                                لديك الآن <strong>{{ $service->pictures->count() }}</strong>  صور لهذه الخدمة
                                            </div>
                                        </div>
                        </div>

                            <div class="widget">
                                <div class="widget-header">
                                    <span class="widget-caption">يمكنك إضافة صور توضيحية أو إعلانية لخدمتك، لتمكن المشتري من رؤية بعض نماذج الخدمة التي تقدمها</span>
                                    <div class="widget-buttons">
                                        <span class="badge badge-info">
                                            لديك الآن <strong>{{ $service->pictures->count() }}</strong>  صور لهذه الخدمة
                                        </span>
                                    </div>
                                </div>
                                <div class="widget-body">
                                    <div class="row">
                                        @foreach ($service->pictures as $pic)
                                            {!! $pic->drawPic() !!}
                                        @endforeach  
                                    </div>

                                </div>
                            </div>

                        @if($service->pictures->count() < $service->picturesLimit)
                            <h5 class="row-title before-blueberry"><i class="typcn typcn-th-menu blueberry"></i>يمكنك إضافة صور توضيحية أو إعلانية لخدمتك، لتمكن المشتري من رؤية بعض نماذج الخدمة التي تقدمها</h5>
                            <div class="clearfix"></div>
                            <div class="widget">
                            {{ Form::open(['route' => ['userAccount.storeServicePictures', $service->cat->parent->slug,$service->cat->slug,$service->id,$service->name], 'class'=>'form dropzone', 'enctype' => 'multipart/form-data', 'id' => 'addServicePicturesForm', 'role' => 'form']) }}
                                <div class="form-group">
                                    {{ Form::hidden('service_id', $service->id) }}
                                </div>
                            {{ Form::close() }}      
                            </div>     
                        @endif  
                    </div>
                  @endif
                </div>
            </div>

          </div>
        </div>

    </div>

</div>
@endsection


@section('scripts')
  <!--Page Related Scripts-->
  <script src="{{ asset('public/assets/beyond/assets/js/validation/bootstrapValidator.js') }}"></script>
  <script src="{{ asset('public/assets/beyond/assets/js/dropzone/dropzone.min.js') }}"></script>
  <!--Jquery Autosize-->
  <script src="{{ asset('public/assets/beyond/assets/js/textarea/jquery.autosize.js') }}"></script>
  <script>
    $(document).ready(function () {
      $("#addServiceForm").bootstrapValidator();

      //--JQuery Autosize--
      $('.textareaanimated').autosize({ append: "\n" });

     
      // Dropzone.options.myDropzone = {
      //       url: "/Account/Create",
      //       autoProcessQueue: false,
      //       uploadMultiple: true,
      //       parallelUploads: 100,
      //       maxFiles: 100,
      //       acceptedFiles: "image/*",

      //       init: function () {

      //           var submitButton = document.querySelector("#submit-all");
      //           var wrapperThis = this;

      //           submitButton.addEventListener("click", function () {
      //               wrapperThis.processQueue();
      //           });

      //           this.on("addedfile", function (file) {

      //               // Create the remove button
      //               var removeButton = Dropzone.createElement("<button class='btn btn-lg dark'>Remove File</button>");

      //               // Listen to the click event
      //               removeButton.addEventListener("click", function (e) {
      //                   // Make sure the button click doesn't submit the form:
      //                   e.preventDefault();
      //                   e.stopPropagation();

      //                   // Remove the file preview.
      //                   wrapperThis.removeFile(file);
      //                   // If you want to the delete the file on the server as well,
      //                   // you can do the AJAX request here.
      //               });

      //               // Add the button to the file preview element.
      //               file.previewElement.appendChild(removeButton);
      //           });

      //           this.on('sendingmultiple', function (data, xhr, formData) {
      //               formData.append("Username", $("#Username").val());
      //           });
      //       }
      //   };

      function putSubCatValues(){
        var mainCatObject = $('select[name="mainCat"]');
        var mainCat = mainCatObject.val();
        if(mainCat > 0) {
              $.ajax({
                  url: '{{ request()->root() }}/userAccount/getSubCatList/'+mainCat,
                  type: "GET",
                  dataType: "json",
                  success:function(data) {
                      $('select[name="cat_id"]').empty();
                      $.each(data, function(key, value) {
                        // console.log(value);
                          $('select[name="cat_id"]').append('<option value="'+ value.id +'">'+ value.nameEn +'</option>');
                      });

                  }
              });
          }else{
              $('select[name="cat_id"]').empty();
              $('select[name="cat_id"]').append('<option value="">اختر التصنيف الرئيسي أولا ثم اختر التصنيف الفرعي</option>');
          }        
      }

      putSubCatValues();

      $('select[name="mainCat"]').on('change', function() {
        putSubCatValues();
      });
    });
  </script>
@endsection