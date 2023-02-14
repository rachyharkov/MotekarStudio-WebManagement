@extends('admin.layouts.app')

@section('content')
    <h2 class="mb-4">List of <b>Frequently Asked Questions</b></h2>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Heads up!</strong> This FAQ will be shown on the front page, to edit it, click twice on the question or answer.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <livewire:admin.crud-faq/>
@endsection

@push('js')
    <script>

        window.livewire.on('faqSaved', function() {
            // console.log('FAQ saved');
        });

        $(document).ready(function() {

            function refreshSort() {
                var urutan = 1;
                $(".tab").each(function() {
                    $(this).attr("data-urutan", urutan);
                    urutan++;
                });
            }

            function updateData() {
                var data = [];
                $(".tab").each(function() {
                    var id = $(this).attr("data-urutan");
                    var question = $(this).find(".question").text();
                    var answer = $(this).find(".tab-content").text();
                    data.push({
                        id: id,
                        question: question,
                        answer: answer
                    });
                });

                window.livewire.emit('faqSaveAll', data)
            }

            function updateVal(currentEle, value) {
                value = value.trim();
                $(currentEle).after('<div class="form-group m-2"><textarea class="answernya form-control" rows="3">' + value + '</textarea><button class="btn btn-primary btn-sm mt-2 btn-update-answer">Update</button><button class="btn btn-danger btn-sm mt-2 btn-cancel-answer-edit" style="margin-left: 5px;">Cancel</button> <a class="text-danger btn-delete-faq mt-2 mr-2" href="#" style="vertical-align: -webkit-baseline-middle;margin: 13px;">Delete</a></div>');
                currentEle.hide();
                $(".answernya").focus();
                $(".btn-update-answer").click(function () {
                    $(this).attr("disabled", true).html('<i class="fas fa-spinner fa-spin"></i>');
                    var newVal = $(".answernya").val();
                    var trimmVal = newVal.trim();
                    $(currentEle).html(trimmVal);
                    $(currentEle).next().remove();
                    $(currentEle).show();
                    updateData()
                });

                $(".btn-delete-faq").click(function (e) {
                    e.preventDefault();
                    $(this).attr("disabled", true).html('<i class="fas fa-spinner fa-spin"></i>');
                    $(currentEle).parent().remove();
                    refreshSort();
                    updateData()

                    Swal.fire({
                        'title': 'Deleted!',
                        'text': 'FAQ has been deleted.',
                        'icon': 'success',
                        'confirmButtonText': 'Ok'
                    })
                });

                $(".btn-cancel-answer-edit").click(function () {
                    $(currentEle).next().remove();
                    $(currentEle).show();
                });
            }

            function updateValQuestion(currentEle, value) {
                $(currentEle).after('<div class="input-group input-group-sm"><input type="text" class="questionnya form-control" value="' + value + '"><div class="input-group-append btn-group"><button class="btn btn-primary btn-update-question">Update</button><button class="btn btn-danger btn-cancel-question-edit">Cancel</button></div></div>');
                currentEle.hide();
                $(".questionnya").focus();
                $(".btn-update-question").click(function () {
                    $(this).attr("disabled", true).html('<i class="fas fa-spinner fa-spin"></i>');
                    var newVal = $(".questionnya").val();
                    var trimmVal = newVal.trim();
                    $(currentEle).html(trimmVal);
                    $(currentEle).next().remove();
                    $(currentEle).show();
                    updateData()
                });

                $(".btn-cancel-question-edit").click(function () {
                    $(currentEle).next().remove();
                    $(currentEle).show();
                });
            }

            $(document).on('dblclick', '.tab-content', function(e) {
                e.stopPropagation();
                var currentEle = $(this);
                var value = $(this).text();
                updateVal(currentEle, value);
            });

            $(document).on('dblclick', '.question' ,function(e) {
                e.stopPropagation();
                var currentEle = $(this);
                var value = $(this).text();
                updateValQuestion(currentEle, value);
            });

            $(document).on('click', '.btn-add-faq', function() {
                var urutan = $(".tab").length + 1;
                var html = `
                    <li class="tab" data-urutan="${urutan}">
                        <input type="checkbox" class="checkboxny" id="rd${urutan}" name="rd">
                        <label class="tab-label" for="rd${urutan}"><i class="fas fa-grip-vertical handler-grip"></i> <span class="question">New Question Here</span></label>
                        <div class="tab-content">
                            Insert your answer here
                        </div>
                    </li>
                `;

                $(".tabs").append(html);
                updateData()
            })

            $('.tabs').sortable({
                handle: '.fa-grip-vertical',
                cursor: 'move',
                update: function(event, ui) {
                    console.log('update');
                    refreshSort()
                    updateData()
                }
            });
        });
    </script>
@endpush
