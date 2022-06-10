var XHR = function (linkUrl, reload) {
    var self = this;

    self.linkUrl = linkUrl;

    self.reload = function () {
        toastr.options.onHidden = function () {
            location.reload();
        };
    };

    self.columnChange = function (obj) {

        if (Object.keys(obj).length < 4) {
            return false;
        }

        var data = obj;

        axios
            .post(self.linkUrl, data)
            .then(response => {
                if (response.data.error) {
                    toastr.warning(response.data.message);
                } else {
                    if (reload) {
                        self.reload();
                    }
                    toastr.success(response.data.message);
                }
            })
            .catch(error => {
                //if error.response not found that is axios internal error
                if (error.response.data.message) {
                    toastr.warning(error.response.data.message);
                } else {
                    toastr.warning("Opps! Something wrong. Please try again.");
                }
            });
    };

    self.sortFn = function (obj) {

        if (!Object.keys(obj).length) {
            return false;
        }

        var data = obj;

        axios
            .post(self.linkUrl, data)
            .then(response => {
                if (response.data.error) {
                    toastr.warning(response.data.message);
                } else {
                    if (reload) {
                        self.reload();
                    }
                    toastr.success(response.data.message);
                }
            })
            .catch(error => {
                //if error.response not found that is axios internal error
                if (error.response.data.message) {
                    toastr.warning(error.response.data.message);
                } else {
                    toastr.warning("Opps! Something wrong. Please try again.");
                }
            });
    };
};
