// Utility functions
import type { TableColumns } from '@/utils';
import { CreateColumns, useUnverifiedBoxesQuery, useVerifiedBoxesQuery } from '@/utils';

// Style and ant design
import s from './BoxesPage.module.less';
import { Typography, Space, Layout, Table } from 'antd';
import { createDisplayableData } from '@/utils/Functions/createRefactorData';
import { Outlet } from 'react-router-dom';

const { Title } = Typography;
const { Content } = Layout;

export const BoxesForApprovalPage = () => {
  // Ustawienia dla poszczególnych kolumn
  const columnsOptions: TableColumns[] = [
    {
      titleName: 'ID',
      keyName: 'id',
      sortType: 'number',
      search: true,
      fixed: 'left',
      width: 70,
    },
    {
      titleName: 'Wolontariusz',
      keyName: 'name',
      sortType: 'string',
      search: true,
      fixed: 'left',
      width: 200,
    },
    {
      titleName: 'EUR',
      keyName: 'amount_EUR',
      sortType: 'number',
      afterText: '€',
      width: 100,
    },
    {
      titleName: 'GBP',
      keyName: 'amount_GBP',
      sortType: 'number',
      afterText: '£',
      width: 100,
    },
    {
      titleName: 'USD',
      keyName: 'amount_USD',
      sortType: 'number',
      afterText: '$',
      width: 100,
    },
    {
      titleName: 'PLN',
      keyName: 'amount_PLN',
      sortType: 'number',
      width: 100,
      afterText: 'PLN',
    },
    {
      titleName: 'Inne',
      keyName: 'comment',
      search: true,
      width: 200,
    },
    {
      titleName: 'Godzina przeliczenia',
      keyName: 'time_counted',
      sortType: 'date',
      width: 150,
    },
    {
      titleName: 'Actions',
      keyName: 'actions',
      fixed: 'right',
      width: 220,
      actions: [
        {
          title: 'Podgląd',
          link: '/liczymy/countedBoxes/show/',
          color: 'blue',
        },
        {
          title: 'Modyfikuj',
          link: '/liczymy/countedBoxes/edit/',
          color: 'blue',
        },
      ],
    },
  ];

  const { data: unverifiedData } = useUnverifiedBoxesQuery();

  console.log(unverifiedData);
  const displayableData = createDisplayableData(unverifiedData);

  const { data: verifiedData } = useVerifiedBoxesQuery();

  const displayableVerifiedData = createDisplayableData(verifiedData);

  const verifiedColumns = CreateColumns(columnsOptions, displayableVerifiedData);

  // Tworzenie kolumn
  const columns = CreateColumns(columnsOptions, displayableData);

  return (
    <Layout>
      <Content className={s.content}>
        <Space direction="vertical" size="small" className={s.space}>
          <Title level={4}>Do zatwierdzenia</Title>
          <Table
            size="middle"
            columns={columns}
            pagination={false}
            dataSource={displayableData}
            rowKey="id"
            scroll={{ y: '70vh' }}
            rowClassName={s.table_row}
          />
        </Space>
        <Space direction="vertical" size="small" className={s.space}>
          <Title level={4}>Zatwierdzone</Title>
          <Table
            size="middle"
            columns={verifiedColumns}
            pagination={false}
            dataSource={displayableVerifiedData}
            rowKey="id"
            scroll={{ y: '70vh' }}
            rowClassName={s.table_row}
          />
        </Space>

        <Outlet />
      </Content>
    </Layout>
  );
};
