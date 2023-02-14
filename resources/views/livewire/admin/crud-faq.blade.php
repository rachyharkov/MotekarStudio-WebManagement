<div>
    <style>
        /* Accordion styles */
        .tabs {
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 4px -2px rgba(0, 0, 0, 0.5);
            list-style: none;
            padding: 0;
        }

        .tab {
            width: 100%;
            color: white;
            overflow: hidden;
        }

        .tab-label {
            display: flex;
            justify-content: space-between;
            padding: 1em 1em 1em 2em;
            background: #2c3e50;
            font-weight: bold;
            cursor: pointer;
            position: relative;
            /* Icon */
        }

        .tab-label:hover {
            background: #1a252f;
        }

        .tab-label::after {
            content: "❯";
            width: 1em;
            height: 1em;
            text-align: center;
            transition: all 0.35s;
        }

        .tab-content {
            max-height: 0;
            padding: 0 1em;
            color: #2c3e50;
            background: white;
            transition: all 0.35s;
        }

        .tab-close {
            display: flex;
            justify-content: flex-end;
            padding: 1em;
            font-size: 0.75em;
            background: #2c3e50;
            cursor: pointer;
        }

        .tab-close:hover {
            background: #1a252f;
        }

        .tabs input.checkboxny {
            position: absolute;
            opacity: 0;
            z-index: -1;
        }

        .tabs input.checkboxny:checked+.tab-label {
            background: #1a252f;
        }

        .tabs input.checkboxny:checked+.tab-label::after {
            transform: rotate(90deg);
        }

        .tabs input.checkboxny:checked~.tab-content {
            max-height: 100vh;
            padding: 1em;
        }

        .tabs label .fa-grip-vertical {
            position: absolute;
            left: 7px;
            top: 11px;
            z-index: 3;
            color: rgb(182, 182, 182);
            font-size: 2em;
            padding: 5px;
        }
    </style>
    <ul class="tabs">
        @if($faqs->count() > 0)
            @foreach($faqs as $faq)
                <li class="tab" data-urutan="{{ $faq->id}}">
                    <input type="checkbox" class="checkboxny" id="rd{{ $faq->id }}" name="rd">
                    <label class="tab-label" for="rd{{ $faq->id }}"><i class="fas fa-grip-vertical handler-grip"></i> <span class="question">{{ $faq->question }}</span></label>
                    <div class="tab-content">
                        {{ $faq->answer }}
                    </div>
                </li>
            @endforeach
        @endif
    </ul>

    <div class="actions" style="width: 100%; text-align: center;">
        <button class="btn btn-primary mt-3 btn-add-faq"><i class="fas fa-plus"></i> Add New</button>
    </div>
</div>
