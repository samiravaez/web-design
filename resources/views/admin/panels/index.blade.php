@extends('admin.main')

@section('title',"تنظیمات پنل های سایت")

@section("custom-style")
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/antd/4.16.3/antd.min.css"
          integrity="sha512-ASBueMMdqciptu03DjlqbMCskuimSmfc76fs5CPwNR1jmi1SzN/loPJ6lZi7MVNCFCjqmPJAw0U7VwGc3Y9kNg=="
          crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        #example1 tr {
            direction: ltr;
            text-align: center;
            font-family: "Nunito", sans-serif;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{asset("vendors/dataTable/dataTables.min.css")}}">
@endsection


@section('content1')


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>تنظیمات</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">پنل ها</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page-header -->

    <!-- begin::page content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <h6 class="card-header">پنل ها</h6>
                    <div class="card-body">
                        <form>
                            <div class="card">
                                <div class="card-body" style="background-color: rgb(162,162,162)">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="panel_one">نام پنل 1
                                                    <a href="#" class="addtopanel"><span class="badge badge-success">افزودن <i
                                                                class="fa fa-plus"></i></span></a>
                                                </label>
                                                <input type="text" name="option[panels][1][name]" class="form-control"
                                                       id="panel_one"
                                                       autocomplete="off" value="{{$option['site_name']}}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="panel_one">مورد 1
                                                    <a href="#" class=""><span class="badge badge-danger"><i
                                                                class="fa fa-times"></i></span></a>
                                                </label>
                                                <input type="text" name="option[panels][1][name]" class="form-control"
                                                       id="panel_one"
                                                       autocomplete="off" value="{{$option['site_name']}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body" style="background-color: rgb(162,162,162)">
                                    <div class="col-md-12 mb-3">
                                        <div class="form-row">
                                            <div class="col-md-12 mb-3">
                                                <label for="panel_one">نام پنل 2
                                                    <a href="#" class="addtopanel"><span class="badge badge-success">افزودن <i
                                                                class="fa fa-plus"></i></span></a>
                                                </label>
                                                <input type="text" name="option[panels][1][name]" class="form-control"
                                                       id="panel_one"
                                                       autocomplete="off" value="{{$option['site_name']}}">
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label for="panel_one">مورد 1
                                                    <a href="#" class=""><span class="badge badge-danger"><i
                                                                class="fa fa-times"></i></span></a>
                                                </label>
                                                <input type="text" name="option[panels][1][name]" class="form-control"
                                                       id="panel_one"
                                                       autocomplete="off" value="{{$option['site_name']}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end::page content -->





@endsection

@section('content')


    <!-- begin::page-header -->
    <div class="page-header">
        <div class="container-fluid d-sm-flex justify-content-between">
            <h4>تنظیمات</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route("dashboard")}}">داشبورد</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">پنل ها</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- end::page-header -->

    <!-- begin::page content -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12" id="panel">

            </div>
        </div>
    </div>
    <!-- end::page content -->





@endsection

@section("custom-script")
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
    <script crossorigin="" src="https://unpkg.com/react@17/umd/react.development.js"></script>
    <script crossorigin="" src="https://unpkg.com/react-dom@17/umd/react-dom.development.js"></script>
    <script src="https://unpkg.com/antd/dist/antd-with-locales.js"></script>
    <script type="text/babel">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function () {
            const {Form, Input, InputNumber, Button, Spin, Tag, Select, ConfigProvider} = antd;
            function Panel(props) {
                const [items, setItems] = React.useState((props.data && props.data.items) ? props.data.items : []);

                function handleClick(e) {
                    setItems([...items, {name: null}]);
                }

                function handleDeleteClick(e, itemId) {
                    let it = items.filter((value,index)=>{
                        console.log(index === itemId);
                        return index !== itemId
                    });
                    setItems(it);
                }

                const style = {
                    CardStyle: {
                        marginBottom: "20px",
                        borderColor: "#A2A2A2FF"
                    },
                    SpaceStyle: {display: 'flex', marginBottom: 8}
                }

                function inputName(name) {
                    return `panel[${props.index}][${name}]`
                }

                function inputItemName(name, index) {
                    return `panel[${props.index}][items][${index}][${name}]`
                }

                return (
                    <antd.Card style={style.CardStyle}>
                        <Form.Item labelAlign={'right'}
                                   label={`نام پنل ${props.index + 1}`}
                                   name={inputName('name')}
                                   initialValue={props.data && props.data.name}>
                            <Input/>
                        </Form.Item>
                        <Form.Item labelAlign={'right'}
                                   label={'لوگو'}
                                   name={inputName('photo')}
                                   initialValue={props.data && props.data.photo}>
                            <Select>
                                <Select.Option value={'telegram'}>telegram</Select.Option>
                                <Select.Option value={'youtube'}>youtube</Select.Option>
                                <Select.Option value={'instagram'}>instagram</Select.Option>
                                <Select.Option value={'facebook'}>facebook</Select.Option>
                                <Select.Option value={'linkdin'}>linkdin</Select.Option>
                                <Select.Option value={'tiktok'}>tiktok</Select.Option>
                            </Select>
                        </Form.Item>
                        <antd.Card
                            title={<antd.Button onClick={handleClick} type="success" shape="circle"
                                                icon={<i className="fa fa-plus"/>}/>}>

                            {items.length > 0 && items.map((value, index) => (
                                <antd.Space key={index} style={style.SpaceStyle} align="baseline">
                                    <Form.Item key={index}
                                               label={`مورد ${index + 1}`}
                                               name={inputItemName('name', index)} initialValue={value.name}>
                                        <Input/>
                                    </Form.Item>
                                    <antd.Button onClick={(e) => handleDeleteClick(e, index)} type="success"
                                                 shape="circle"
                                                 icon={<i className="fa fa-minus text-danger"/>}/>
                                </antd.Space>
                            ))}
                        </antd.Card>
                    </antd.Card>
                )
            }

            function App() {
                const [form] = Form.useForm();
                var data = JSON.parse(@json($panels));

                function onfinish(value) {
                    $.ajax({
                        url: '{{route("settings.panels")}}',
                        method: 'post',
                        data: value,
                        dataType: 'json',
                        success: function (data){
                            if(data.status){
                                toastr.success("با موفقیت ثبت شد");
                            }
                        }
                    })
                }

                return (
                    <React.Fragment>
                        <ConfigProvider direction={'rtl'}>

                            <antd.Card title={"پنل ها"}>
                                <Form form={form} onFinish={onfinish} action="{{route("settings.panels")}}"
                                      method={'post'}>
                                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                    <Panel key={1} index={0} data={data[0]}/>
                                    <Panel key={2} index={1} data={data[1]}/>
                                    <Panel key={3} index={2} data={data[2]}/>
                                    <Panel key={4} index={3} data={data[3]}/>
                                    <Panel key={5} index={4} data={data[4]}/>
                                    <Panel key={6} index={5} data={data[5]}/>
                                    <input type="submit" className="btn btn-primary" value="ثبت"/>
                                </Form>
                            </antd.Card>


                        </ConfigProvider>
                    </React.Fragment>
                );
            }

            ReactDOM.render(
                <App/>,
                document.getElementById('panel'))
        })
    </script>
    @include("admin.flash")
@endsection
