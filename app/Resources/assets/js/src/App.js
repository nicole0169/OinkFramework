Oink.App = function () {
    this.controllers = {};
};

Oink.App.prototype.get = function (controller) {
    return this.controllers[controller];
};

Oink.App.prototype.execute = function () {
    for (var className in Oink) {
        if (className !== 'App') {
            var controller = new Oink[className](this);
            this.controllers[className] = controller;

            if (typeof controller.execute === 'function') {
                controller.execute();
            }

            if (typeof controller.listen === 'function') {
                controller.listen();
            }

            if (typeof controller.focus === 'function') {
                controller.focus();
            }

            if (typeof controller.keyboardShortcuts === "function") {
                controller.keyboardShortcuts();
            }
        }
    }
    this.init();
    this.sidebarToggle();
};

Oink.App.prototype.init = function () {
    var wrapper = $('.wrapper');
    if (window.localStorage && window.localStorage['oink.stickySidebar'] === 'true') {
        wrapper.removeClass("wrapper-collapsed");
        wrapper.find(".sidebar").show();
    } else {
        wrapper.addClass("wrapper-collapsed");
        wrapper.find(".sidebar").hide();
    }
};

Oink.App.prototype.sidebarToggle = function() {

    $(document).on("click", ".sidebar-toggle", function(e) {
        var wrapper = $(this).parents(".wrapper");
        e.preventDefault();

        if (wrapper.hasClass("wrapper-collapsed")) {
            wrapper.find(".sidebar").show("slow");
            wrapper.removeClass("wrapper-collapsed");
            window.localStorage.setItem('oink.stickySidebar', true);
        } else {
            wrapper.find(".sidebar").hide("slow");
            wrapper.addClass("wrapper-collapsed");
            window.localStorage.setItem('oink.stickySidebar', false);
        }
    });
};