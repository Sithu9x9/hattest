// Function to strip HTML tags
function stripHtml(html) {
    var tmp = document.createElement("DIV");
    tmp.innerHTML = html;
    return tmp.textContent || tmp.innerText || "";
}

// Function to limit text to the first 100 words
function truncateText(text, wordLimit) {
    var words = text.split(/\s+/); // Split by any whitespace
    if (words.length > wordLimit) {
        return words.slice(0, wordLimit).join(" ") + " ...";
    }
    return text;
}

$(".summernote").summernote({
    tabDisable: true,
    placeholder: "Type Something here...",
    tabsize: 2,
    height: 150,
    toolbar: [
        // [groupName, [list of button]]
        ["style", ["bold", "italic", "underline", "clear"]],
        ["fontname", ["fontname"]],
        ["fontsize", ["fontsize"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["insert", ["link"]],
        ["height", ["height"]],
        ["view", ["fullscreen", "help"]],
    ],
    popover: {
        air: [
            ["color", ["color"]],
            ["font", ["bold", "underline", "clear"]],
            ["para", ["ul", "paragraph"]],
            ["insert", ["link", "picture"]],
        ],
        link: [["link", ["linkDialogShow", "unlink"]]],
    },
});
