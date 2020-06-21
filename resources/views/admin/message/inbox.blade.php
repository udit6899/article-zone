@extends('layouts.backend.app')

@section('title', 'Inbox')

@push('css')

@endpush

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <a class="btn btn-info waves-effect" href="{{ route("admin.message.index") }}">
                <i class="material-icons">list_alt</i>
                <span>All</span>
            </a>
            <a class="btn btn-info waves-effect" href="{{ route("admin.message.read") }}">
                <i class="material-icons">mark_email_read</i>
                <span>Read</span>
            </a>
            <a class="btn btn-info waves-effect" href="{{ route("admin.message.unread") }}">
                <i class="material-icons">mark_email_unread</i>
                <span>Unread</span>
            </a>
        </div>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            @if(Request::is('admin/message/read'))
                                ALL READ MESSAGE
                            @elseif(Request::is('admin/message/unread'))
                                ALL UNREAD MESSAGES
                            @else
                                ALL MESSAGES
                            @endif
                            <span class="badge bg-color-black-gray">{{ $messages->count() }}</span>
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead class="bg-color-black-gray">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages as $key=>$message)
                                    <tr class="text-color-black">
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ Str::limit($message->message, 25) }}</td>
                                        <td>
                                            @if($message->is_replied)
                                                <span class="badge bg-light-green">replied</span>
                                            @else
                                                <span class="badge bg-pink">unread</span>
                                            @endif
                                        </td>
                                        <td>{{ $message->created_at }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-xs bg-blue-grey waves-effect"
                                                    title="View" onclick="readMessage({{ $message->toJson() }})">
                                                <i class="material-icons action-icon">visibility</i>
                                            </button>
                                            @if(Request::is('admin/message/unread'))
                                                <button type="button" class="btn btn-xs bg-cyan waves-effect"
                                                        title="Reply" onclick="replyMessage({{ $message->toJson() }})">
                                                    <i class="material-icons action-icon">reply</i>
                                                </button>
                                                <form class="form-hide"
                                                      action="{{ route("admin.message.update", $message->id) }}"
                                                      id="{{ 'reply-message-' . $message->id }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <textarea id="{{ 'message-' . $message->id }}" name="reply"></textarea>
                                                </form>
                                            @endif
                                            <button type="button" class="btn btn-xs bg-deep-orange waves-effect"
                                                    title="Delete" onclick="deleteItem({{ $message->id }})">
                                                <i class="material-icons action-icon">delete</i>
                                            </button>
                                            <form id="delete-form-{{ $message->id }}" class="form-hide"
                                                  action="{{ route('admin.message.destroy', $message->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
@endsection

@push('js')

@endpush
