<?php
class SendSOAPMessageStub {
    
    public static function sendMessage($send_data, $remote_port, $local_port, &$recv_message, $denbun_id, $hostlog_kainno) 
    {
        SSKLog::d(sprintf("%s(%s) start", __FUNCTION__, __LINE__));
        $p_err_number = 0;
        $message_path = '/home/ssktool/messages/' . strtoupper($denbun_id);
        SSKLog::d("file open: denbun_id -> {$denbun_id}, {$message_path}");
        $handle = fopen($message_path, 'r');
        if ($handle === false) {
            $p_err_number = 9;
            SSKLog::d("file open failure: denbun_id -> {$denbun_id}, {$message_path}");
            $recv_message = "送信エラー（スタブ）：電文ID［{$denbun_id}］が不正";
            return $p_err_number;
        }
        $msg = "";
        SSKLog::d("file open success!: denbun_id -> {$denbun_id}, {$message_path}");
        while(($buffer = fgets($handle, 4096)) !== false) {
            $msg .= $buffer;
        }
        SSKLog::d("file close: denbun_id -> {$denbun_id}, {$message_path}");
        fclose($handle);
        $msgs = explode(',', $msg);
        $msgs[] = chr(3);
        $recv_message = implode(',', $msgs);
        SSKLog::d(sprintf("%s(%s) end", __FUNCTION__, __LINE__));
        return $p_err_number;
    }
}


