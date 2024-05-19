<?php
include 'Client.php';

class CompteBancaire {
    public $id;
    public $accountNumber;
    public $balance;
    public $client;

    public function __construct($accountNumber, $balance, $client) {
        $this->accountNumber = $accountNumber;
        $this->balance = $balance;
        $this->client = $client;
    }

    public function save() {
        global $pdo;

        try {
            $pdo->beginTransaction();

            // Vérifier si le client existe déjà dans la base de données
            $stmt = $pdo->prepare("SELECT id FROM clients WHERE first_name = ? AND last_name = ? AND address = ? AND phone_number = ?");
            $stmt->execute([$this->client->firstName, $this->client->lastName, $this->client->address, $this->client->phoneNumber]);
            $existingClient = $stmt->fetch();

            if ($existingClient) {
                $this->client->id = $existingClient['id'];
            } else {
                // Sauvegarder le client
                $stmt = $pdo->prepare("INSERT INTO clients (first_name, last_name, address, phone_number) VALUES (?, ?, ?, ?)");
                $stmt->execute([$this->client->firstName, $this->client->lastName, $this->client->address, $this->client->phoneNumber]);
                $this->client->id = $pdo->lastInsertId();
            }

            // Sauvegarder le compte bancaire
            $stmt = $pdo->prepare("INSERT INTO bank_accounts (account_number, balance, client_id) VALUES (?, ?, ?)");
            $stmt->execute([$this->accountNumber, $this->balance, $this->client->id]);
            $this->id = $pdo->lastInsertId();

            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            throw $e;
        }
    }

    public static function findByAccountNumber($accountNumber) {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM bank_accounts WHERE account_number = ?");
        $stmt->execute([$accountNumber]);
        $accountData = $stmt->fetch();
        
        if ($accountData) {
            $stmt = $pdo->prepare("SELECT * FROM clients WHERE id = ?");
            $stmt->execute([$accountData['client_id']]);
            $clientData = $stmt->fetch();

            $client = new Client($clientData['first_name'], $clientData['last_name'], $clientData['address'], $clientData['phone_number']);
            $client->id = $clientData['id'];

            $account = new CompteBancaire($accountData['account_number'], $accountData['balance'], $client);
            $account->id = $accountData['id'];

            return $account;
        }

        return null;
    }

    public function deposit($amount) {
        global $pdo;
        $this->balance += $amount;
        $stmt = $pdo->prepare("UPDATE bank_accounts SET balance = ? WHERE id = ?");
        $stmt->execute([$this->balance, $this->id]);

        $this->recordTransaction('deposit', $amount);
    }

    public function withdraw($amount) {
        if ($amount <= $this->balance) {
            global $pdo;
            $this->balance -= $amount;
            $stmt = $pdo->prepare("UPDATE bank_accounts SET balance = ? WHERE id = ?");
            $stmt->execute([$this->balance, $this->id]);

            $this->recordTransaction('withdrawal', $amount);
        } else {
            throw new Exception("Solde insuffisant");
        }
    }

    public function transfer($amount, $toAccount) {
        if ($amount <= $this->balance) {
            global $pdo;
            $this->balance -= $amount;
            $toAccount->balance += $amount;

            $stmt = $pdo->prepare("UPDATE bank_accounts SET balance = ? WHERE id = ?");
            $stmt->execute([$this->balance, $this->id]);

            $stmt = $pdo->prepare("UPDATE bank_accounts SET balance = ? WHERE id = ?");
            $stmt->execute([$toAccount->balance, $toAccount->id]);

            $this->recordTransaction('transfer', $amount, $toAccount->accountNumber);
        } else {
            throw new Exception("Solde insuffisant");
        }
    }

    private function recordTransaction($type, $amount, $toAccountNumber = null) {
        global $pdo;
        $stmt = $pdo->prepare("INSERT INTO transactions (account_id, transaction_type, amount, transaction_date) VALUES (?, ?, ?, NOW())");
        $stmt->execute([$this->id, $type, $amount]);
    }

    public function getTransactions() {
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM transactions WHERE account_id = ?");
        $stmt->execute([$this->id]);
        return $stmt->fetchAll();
    }
}
?>
