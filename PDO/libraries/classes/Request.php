<?php

class Request extends Connect
{
      private $count;
      private $result;

      private function countParameters($parameters)
      {
            $this->count = count($parameters);
      }

      private function prepareStatements($query, $parameters)
      {
            $this->countParameters($parameters);
            $this->result = $this->getConnection()->prepare($query);
            if ($this->count > 0) {
                  for ($i=1; $i < $this->count; $i++) {
                        $this->result->bindValue($i, $parameters[$i-1]);
                  }
            }
            $this->result->execute();
      }

      public function select($table, $fields, $where, $parameters)
      {
            $this->prepareStatements("select {$fields} from {$table} {$where}", $parameters);
            return $this->result;
      }

      public function insert($table, $values, $parameters)
      {
            $this->prepareStatements("insert into {$table} values ({$values})", $parameters);
            return $this->result;
      }

      public function update($table, $set, $where, $parameters)
      {
            $this->prepareStatements("update {$table} set {$set} where {$where}", $parameters);
            return $this->result;
      }

      public function delete($table, $where, $parameters)
      {
            $this->prepareStatements("delete from {$table} where {$where}", $parameters);
            return $this->result;
      }

}
