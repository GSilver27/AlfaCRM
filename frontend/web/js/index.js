import { actionConnect } from "/frontend/web/js/js.js";
$(document).ready(async () => {
  // const cource = {
  //     entity: "subject",
  //     method: "index",
  //   },
  //   { response } = await actionConnect(cource),
  //   card = document.querySelectorAll(".items_card-course"),
  //   data = {
  //     entity: "calendar",
  //     method: "customer",
  //     data: null,
  //     get: {
  //       id: 3164,
  //       date1: "01.05.2022",
  //       date2: "30.09.2022",
  //     },
  //   },
  //   calendar = await actionConnect(data),
  //   calendarInfo = await calendar.response,
  //   subject_idArr = calendarInfo.map((lesson) => lesson.subject_id),
  //   subject_id = subject_idArr.filter(
  //     (index, pos) => subject_idArr.indexOf(index) === pos
  //   );
  // });
  // card.forEach((e) => {
  //   let random = Math.floor(Math.random() * response.items.length);
  //   e.children[1].innerHTML = response.items[random].name;
  // });
  // $(".lesson_info-title").text(calendarInfo[0].subject);

  //========================
  const subjectData = {
    entity: "cgi",
    method: "index",
    data: {},
    get: { group_id: 128 },
  };
  console.log(await actionConnect(subjectData));
});
