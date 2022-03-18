<div class="eventDetailInfo">

    <h1 class="eventDetailInfo__title">{{ $event -> event_name }}</h1>

    <div class="eventDetailInfo__disription">Описание: {{ $event -> event_discrtiption }}</div>
    <div class="eventDetailInfo__format">Формат проведения: {{ $event -> event_format }}</div>

    <div class="eventDetailInfo__dates">
        <div class="eventDetailInfo__dates-begDate">Дата начала: {{ $event -> begin_date }}</div>

        <div class="eventDetailInfo__dates-endDate">Дата окончания: {{ $event -> end_date }}</div>
    </div>

    <div class="eventDetailInfo__requirmets">

        <div class="eventDetailInfo__requirmets-requirmets">Требования: {{ $event -> event_requirements }}</div>

        <div class="eventDetailInfo__requirmets-age">Ограничение по возрасту:{{ $event -> event_age }}</div>

    </div>

    <div class="eventDetailInfo__type">Тип мероприятия: {{  $event -> type -> event_type_name  }}</div>
    <div class="eventDetailInfo__level">Уровень мероприятия: {{  $event -> level -> event_level_name  }}</div>
    <div class="eventDetailInfo__status">Статус мероприятия: {{  $event -> status -> event_status_name  }}</div> 
    <div class="eventDetailInfo__user">Ответственный преподаватель {{  $event -> user -> name  }} {{  $event -> user -> surname  }} {{  $event -> user -> lastname  }}</div>

</div>