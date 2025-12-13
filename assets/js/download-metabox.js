(function () {
  console.log("Download metabox JS loaded");

  document.addEventListener("click", function (e) {
    const btn = e.target.closest("#download_file_pick");
    if (!btn) return;

    e.preventDefault();
    console.log("Select File clicked");

    if (!window.wp || !wp.media) {
      alert("Media library not available");
      return;
    }

    const input = document.getElementById("download_file_id");
    if (!input) return;

    const frame = wp.media({
      title: "Select download file",
      button: { text: "Use this file" },
      multiple: false,
    });

    frame.on("select", function () {
      const att = frame.state().get("selection").first().toJSON();
      input.value = att.id;
      console.log("File selected:", att);
    });

    frame.open();
  });
})();
