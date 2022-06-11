<div class="eventDetailInfo">
    <a class="eventDetailInfo__titleLink" href="{{ route('event_detail', $event -> id) }}"><h1 class="eventDetailInfo__title">{{ $event -> event_name }}</h1></a>

    <div class="eventDetailInfo__left">  
        <div class="eventDetailInfo__group">
            <div class="eventDetailInfo__data"><b>Описание:</b></div>
            <div class="eventDetailInfo__data"> {{ $event -> event_discrtiption }}</div>
        </div>
        <div class="eventDetailInfo__group">
            <div class="eventDetailInfo__data"><b>Формат проведения:</b></div>
            <div class="eventDetailInfo__data"> {{ $event -> event_format }}</div>
        </div>
        <div class="eventDetailInfo__group">
            <div class="eventDetailInfo__data"><b>Тип мероприятия:</b></div>
            <div class="eventDetailInfo__data"> {{  $event -> type -> event_type_name  }}</div>
        </div>
        <div class="eventDetailInfo__group">
            <div class="eventDetailInfo__data"><b>Уровень мероприятия:</b></div>
            <div class="eventDetailInfo__data"> {{  $event -> level -> event_level_name  }}</div>
        </div>
        <div class="eventDetailInfo__group">
            <div class="eventDetailInfo__data"><b>Статус мероприятия:</b></div>
            <div class="eventDetailInfo__data"> {{  $event -> status -> event_status_name  }}</div> 
        </div>
        <div class="eventDetailInfo__group">
            <div class="eventDetailInfo__data"><b>Ответственный преподаватель:</b> </div>
            <div class="eventDetailInfo__data"> {{  $event -> user -> name  }} {{  $event -> user -> surname  }} {{  $event -> user -> lastname  }}</div>
        </div>
    </div>

    <div class="eventDetailInfo__right">
        <div class="eventDetailInfo__info">
            <div class="eventDetailInfo__group">
                <h1 class="eventDetailInfo__title">Ограничения</h1>
                <div class="eventDetailInfo__text">{{ $event -> event_requirements }}</div>
            </div>

            <div class="eventDetailInfo__group">
                <h1 class="eventDetailInfo__title">Требования</h1>
                <div class="eventDetailInfo__text">{{ $event -> event_age }}</div>
            </div>
        </div>
    
        <div class="eventDetailInfo__dates">
            <h1 class="eventDetailInfo__title">Период проведения:</h1>
            <div class="eventDetailInfo__text">с {{ $event -> begin_date }} до {{ $event -> end_date }}</div>
        </div>
    </div>
</div>