export function actionConnect(e) {
  return $.ajax({
    url: "/site/connect",
    type: "POST",
    dataType: "JSON",
    data: e,
    // beforeSend: function () {
    //   $(".preloader").fadeIn(1);
    // },
  }).done((response) => {
    if (response.status) {
      return response;
    } else {
      $(".preloader_text").text(response.message);
    }
  });
}

$(".connect").on("click", function () {
  actionConnect($(this).data());
});
