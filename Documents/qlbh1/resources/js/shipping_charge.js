$(document).ready(function () {
    const provinceSelect = $('.province-select2-js').select2({
        ajax: {
            url: '/provinces',
            dataType: 'json',
            processResults: function (data) {
                let provinces = data.provinces;
                let formatData = [];
                for (let province of provinces) {
                    formatData.push({
                        'id': province.id,
                        'text': province.name,
                    })
                }
                return {
                    results: formatData
                };
            }
        }
    });

    const districtSelect = $('.district-select2-js').select2({
        ajax: {
            url: '/districts',
            dataType: 'json',
            data: function (params) {
                let query = {
                    province_id: $('.province-select2-js').find(':selected').val(),
                    search: params.term,
                    type: 'query'
                }
                return query;
            },
            processResults: function (data) {
                let districts = data.districts;
                let formatData = [];
                for (let district of districts) {
                    formatData.push({
                        'id': district.id,
                        'text': district.name,
                    })
                }
                return {
                    results: formatData
                };
            }
        }
    });

    const wardSelect = $('.ward-select2-js').select2({
        ajax: {
            url: '/wards',
            dataType: 'json',
            data: function (params) {
                let query = {
                    district_id: $('.district-select2-js').find(':selected').val(),
                    search: params.term,
                    type: 'query'
                }
                return query;
            },
            processResults: function (data) {
                let wards = data.wards;
                let formatData = [];
                for (let ward of wards) {
                    formatData.push({
                        'id': ward.id,
                        'text': ward.name,
                    })
                }
                return {
                    results: formatData
                };
            }
        }
    });

    provinceSelect.on('change', function (e) {
        showFee();
    });
    districtSelect.on('change', function (e) {
        showFee();
    });
    wardSelect.on('change', function (e) {
        showFee();
    });

    let shippingCharge = $('#shippingCharge').val() && JSON.parse($('#shippingCharge').val());
    if (shippingCharge) {
        const province = shippingCharge.province;
        loadDefaultSelect2(provinceSelect, {
            text: province.name,
            id: province.id
        });
        const district = shippingCharge.district;
        loadDefaultSelect2(districtSelect, {
            text: district.name,
            id: district.id
        });
        const ward = shippingCharge.ward;
        loadDefaultSelect2(wardSelect, {
            text: ward.name,
            id: ward.id
        });
    }

    function loadDefaultSelect2(target, data) {
        let option = new Option(data.text, data.id, true, true);
        target.append(option).trigger('change');
        target.trigger({
            type: 'select2:select',
        });
    }

    function showFee() {
        let $fee = $('#fee')
        console.log($fee);
        let provinceId = provinceSelect.find(':selected').val()
        let districtId = districtSelect.find(':selected').val()
        let wardId = wardSelect.find(':selected').val()
        if ($fee && provinceId && districtId && wardId) {
            $.ajax({
                url: '/shipping-charge/fee',
                type: 'get',
                data: {
                    province_id: provinceId,
                    district_id: districtId,
                    ward_id: wardId,
                },
                success: function (res) {
                    $fee.val(res.formattedFee)
                }
            })
        }
    }
});
