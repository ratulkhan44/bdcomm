$(document).ready(function () {
    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            //console.error(error);
        });
});
$(document).ready(function () {
    BalloonEditor
        .create(document.querySelector('#balloneditor'))
        .catch(error => {
            console.error(error);
        });
});
/*end ckeditors*/
var quill = new Quill('#editors', {
    theme: 'snow'
});
var quill = new Quill('#quillbubble', {
    theme: 'bubble'
});
var quill = new Quill("#quillEditor", {
    modules: {
        toolbar: [
                    ["bold", "italic", "underline", "strike"],
                    ["blockquote", "code-block"],
                    [{
                header: 1
                    }, {
                header: 2
                    }],
                    [{
                list: "ordered"
                    }, {
                list: "bullet"
                    }],
                    [{
                script: "sub"
                    }, {
                script: "super"
                    }],
                    [{
                indent: "-1"
                    }, {
                indent: "+1"
                    }],
                    [{
                direction: "rtl"
                    }],
                    [{
                size: ["small", !1, "large", "huge"]
                    }],
                    [{
                header: [1, 2, 3, 4, 5, 6, !1]
                    }],
                    [{
                color: []
                    }, {
                background: []
                    }],
                    [{
                font: []
                    }],
                    [{
                align: []
                    }],
                    ["clean"]
                ]
    },
    theme: "snow"
});
