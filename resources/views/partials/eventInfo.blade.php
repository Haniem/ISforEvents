<div class="eventDetailInfo">
    
    <a class="eventDetailInfo__titleLink" href="{{ route('event_detail', $event -> id) }}"><h1 class="eventDetailInfo__title">{{ $event -> event_name }}</h1></a>

    <div class="eventDetailInfo__right">

        
        <div class="eventDetailInfo__data">{{ $event -> event_discrtiption }}</div>
        <div class="eventDetailInfo__data">Формат проведения: {{ $event -> event_format }}</div>
        <div class="eventDetailInfo__data">Тип мероприятия: {{  $event -> type -> event_type_name  }}</div>
        <div class="eventDetailInfo__data">Уровень мероприятия: {{  $event -> level -> event_level_name  }}</div>
        <div class="eventDetailInfo__data">Статус мероприятия: {{  $event -> status -> event_status_name  }}</div> 
        <div class="eventDetailInfo__data">Ответственный преподаватель {{  $event -> user -> name  }} {{  $event -> user -> surname  }} {{  $event -> user -> lastname  }}</div>
    
    </div>

    <div class="eventDetailInfo__left">
        <div class="eventDetailInfo__requirmets">
            <h1 class="eventDetailInfo__requirmets-title">Ограничения и требования:</h1>
            <div class="eventDetailInfo__requirmets-requirmets">{{ $event -> event_requirements }}</div>
            <div class="eventDetailInfo__requirmets-age">{{ $event -> event_age }}</div>
        </div>
    
        <div class="eventDetailInfo__dates">
            <h1 class="eventDetailInfo__dates-title">Период проведения:</h1>
            <div class="eventDetailInfo__dates-begDate">с {{ $event -> begin_date }} до {{ $event -> end_date }}</div>
        </div>
    </div>


    
</div>